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
    public function getCheckoutIndex($id)
    {
        $userId = Auth::id();

        // Ambil data pesanan milik user + relasi lengkap
        $pesanan = Pesanan::with([
            'detailPesanan.keranjang.produk',
            'detailPesanan.keranjang.layananHarga'
        ])
        ->where('id', $id)
        ->where('pembeli_id', $userId)
        ->firstOrFail();

        return view('users.checkout.index', compact('pesanan'));
    }
    public function store(Request $request)
    {
        $userId = Auth::id();

        // Ambil item keranjang user yang belum checkout
        $keranjangItems = Keranjang::with(['layananHarga', 'produk'])
            ->where('pembeli_id', $userId)
            ->where('status', 'Belum Checkout')
            ->get();

        if ($keranjangItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kamu masih kosong.');
        }

        // Hitung total
        $total = $keranjangItems->sum(function ($item) {
            return $item->layananHarga->harga * $item->qty;
        });

        DB::beginTransaction();
        try {
            // Simpan pesanan
            $pesanan = Pesanan::create([
                'pembeli_id' => $userId,
                'kode_invoice' => 'INV-' . now()->format('Ymd') .'-'. now()->format('His'), 
                'tanggal_pesanan' => now(),
                'tanggal_acara' => null, // nanti bisa diisi di halaman checkout
                'total_harga' => $total,
                'status_pesanan' => 'Belum Dibayar',
            ]);

            // Simpan detail per item
            foreach ($keranjangItems as $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'keranjang_id' => $item->id,
                    'subtotal' => $item->layananHarga->harga * $item->qty,
                ]);
            }

            // Update status keranjang jadi Sudah Checkout
            Keranjang::where('pembeli_id', $userId)
                ->where('status', 'Belum Checkout')
                ->update([
                    'status' => 'Sudah Checkout'
                ]);

            DB::commit();

            // Redirect ke halaman checkout detail
            return redirect()->route('checkout.show', $pesanan->id)
                ->with('success', 'Pesanan berhasil dibuat. Silakan lengkapi data pengiriman dan pembayaran.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
    }
    public function finalizeCheckout(Request $request, $id)
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

            Pengiriman::create([
                'pesanan_id' => $pesanan->id,
                'metode_pengiriman' => $request->metode_pengiriman,
                'status_pengiriman' => 'Belum Dikirim',
            ]);

            Pembayaran::create([
                'pesanan_id' => $pesanan->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_pembayaran' => 'Belum Dibayar',
            ]);

            // Midtrans setup
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
    public function updateStatus(Request $request)
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
    public function finish(Request $request)
    {
        if (Auth::check()) {
        return redirect()->route('home')->with('success', 'Pembayaran berhasil!');
        }

        return redirect('/')->with('success', 'Pembayaran berhasil!');
    }


}
