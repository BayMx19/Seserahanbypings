<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getCheckoutIndex($id)
    {
        $userId = Auth::id();
        $pesanan = Pesanan::with([
            'detailPesanan.keranjang.produk',
            'detailPesanan.keranjang.layananHarga',
            'pembeli'
        ])
        ->where('id', $id)
        ->where('pembeli_id', $userId)
        ->firstOrFail();
        // dd($pesanan);
        return view('users.checkout.index', compact('pesanan'));
    }
    public function storePesananCheckout(Request $request)
    {
        $userId = Auth::id();
        $keranjangItems = Keranjang::with(['layananHarga', 'produk'])
            ->where('pembeli_id', $userId)
            ->where('status', 'Belum Checkout')
            ->get();
        if ($keranjangItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kamu masih kosong.');
        }
        $total = $keranjangItems->sum(function ($item) {
            return $item->layananHarga->harga * $item->qty;
        });
        DB::beginTransaction();
        try {
            $pesanan = Pesanan::create([
                'pembeli_id' => $userId,
                'kode_invoice' => 'INV-' . now()->format('Ymd') .'-'. now()->format('His'), 
                'tanggal_pesanan' => now(),
                'tanggal_acara' => null,
                'total_harga' => $total,
                'status_pesanan' => 'Belum Dibayar',
            ]);
            foreach ($keranjangItems as $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'keranjang_id' => $item->id,
                    'subtotal' => $item->layananHarga->harga * $item->qty,
                ]);
            }
            Keranjang::where('pembeli_id', $userId)
                ->where('status', 'Belum Checkout')
                ->update([
                    'status' => 'Sudah Checkout'
                ]);
            DB::commit();
            return redirect()->route('checkout.show', $pesanan->id)
                ->with('success', 'Pesanan berhasil dibuat. Silakan lengkapi data pengiriman dan pembayaran.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
    }
    public function postCheckoutFinalize(Request $request, $id)
    {
        $request->validate([
            'tanggal_acara' => 'required|date',
            'metode_pengiriman' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);
        $pesanan = Pesanan::where('id', $id)
            ->where('pembeli_id', Auth::id())
            ->firstOrFail();
        try {
            $pesanan->update([
                'tanggal_acara' => $request->tanggal_acara,
            ]);
            $status_pengiriman = $request->metode_pengiriman === 'Ambil di Tempat'
                ? 'Belum Diambil'
                : 'Belum Dikirim';
            Pengiriman::create([
                'pesanan_id' => $pesanan->id,
                'metode_pengiriman' => $request->metode_pengiriman,
                'status_pengiriman' => $status_pengiriman,
            ]);
            Pembayaran::create([
                'pesanan_id' => $pesanan->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_pembayaran' => 'Belum Dibayar',
            ]);
            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;
            $midtransParams = [
                'transaction_details' => [
                    'order_id' => $pesanan->kode_invoice,
                    'gross_amount' => $pesanan->total_harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
                'callbacks' => [
                    'finish' => route('checkout.redirect-finish') 
                ]
            ];
            $snapToken = Snap::getSnapToken($midtransParams);
            return response()->json([
                'snapToken' => $snapToken
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal proses: ' . $e->getMessage()
            ], 500);
        }
    }
    public function updateCheckoutStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
            'transaction_status' => 'required|string',
        ]);
        $pesanan = Pesanan::where('kode_invoice', $request->order_id)->first();
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
        }
        $pesanan->update([
            'status_pesanan' => 'Pending'
        ]);
        Pembayaran::where('pesanan_id', $pesanan->id)->update([
            'status_pembayaran' => 'Sudah Dibayar'
        ]);
        return response()->json([
            'message' => 'Status pesanan ' . $request->transaction_status . 'Terima Kasih!'
        ]);
    }
    public function getCheckoutFinish(Request $request)
    {
        if (Auth::check()) {
        return redirect()->route('home')->with('success', 'Pembayaran berhasil!');
        }
        return redirect('/')->with('success', 'Pembayaran berhasil!');
    }

    public function getRiwayatPesananIndex()
    {
        $statusAsli = [
            'Pending', 
            'Diproses', 
            'Dikirim', 
            'Sudah Diterima', 
            'Menunggu Pengembalian', 
            'Sudah Dikembalikan', 
            'Selesai'
        ];
        $statusLabels = [
            'Pending' => 'Pending',
            'Diproses' => 'Diproses',
            'Dikirim' => 'Dalam Pengiriman',
            'Sudah Diterima' => 'Sudah Diterima',
            'Menunggu Pengembalian' => 'Menunggu Pengembalian',
            'Sudah Dikembalikan' => 'Sudah Dikembalikan',
            'Selesai' => 'Selesai',
        ];
        $pesananByStatus = [];

         foreach ($statusAsli as $status) {
            $pesananByStatus[$status] = Pesanan::where('pembeli_id', Auth::id())
                ->where('status_pesanan', $status)
                ->with(['detailPesanan.keranjang.produk', 'detailPesanan.keranjang.layananHarga'])
                ->orderByDesc('created_at')
                ->get();
         }

        return view('users.riwayat-pesanan.index', compact('statusAsli', 'statusLabels', 'pesananByStatus'));
    }
    public function updateStatusPesananDiterima($id)
    {
        $pesanan = Pesanan::where('id', $id)->where('pembeli_id', Auth::id())->first();

        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
        if ($pesanan->status_pesanan !== 'Dikirim') {
            return redirect()->back()->with('error', 'Hanya pesanan yang sedang dikirim yang bisa diubah.');
        }

        $pesanan->status_pesanan = 'Sudah Diterima';
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui menjadi Sudah Diterima.');
    }
    public function updateStatusPesananSelesai($id)
    {
        $pesanan = Pesanan::where('id', $id)->where('pembeli_id', Auth::id())->first();

        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
        if (!in_array($pesanan->status_pesanan, ['Sudah Diterima', 'Sudah Dikembalikan'])) {
            return redirect()->back()->with('error', 'Pesanan belum bisa diselesaikan.');
        }
        $pesanan->status_pesanan = 'Selesai';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan telah diselesaikan.');
    }



}
