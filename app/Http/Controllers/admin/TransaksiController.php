<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $pesananList = Pesanan::with(['pembeli', 'pembayaran', 'pengiriman'])
            ->orderByDesc('created_at')
            ->whereHas('pembayaran', function ($query) {
                            $query->where('status_pembayaran', '!=', 'Belum Dibayar');
                        })
            ->get();

    return view('admin.data-transaksi.index', compact('pesananList'));
    }
    public function show($id)
    {
        $pesanan = Pesanan::with([
            'pembeli',
            'pembayaran',
            'pengiriman',
            'detailPesanan.keranjang.produk',
            'detailPesanan.keranjang.layananHarga'
        ])->findOrFail($id);

        return view('admin.data-transaksi.show', compact('pesanan'));
    }
    public function updateTransaksiStatus(Request $request, $id)
    {
        $pesanan = Pesanan::with(['pembayaran', 'pengiriman', 'detailPesanan.keranjang.layananHarga'])->findOrFail($id);

        DB::beginTransaction();
        try {
            if ($request->has('status_pembayaran')) {
                $pesanan->pembayaran->status_pembayaran = $request->status_pembayaran;
            }
            $isSewa = $pesanan->detailPesanan->contains(function ($detail) {
                return in_array($detail->keranjang->layananHarga->layanan, ['Sewa + Jasa Hias', 'Sewa Box']);
            });
            if ($request->has('status_pesanan')) {
                $pesanan->status_pesanan = $request->status_pesanan;
            }
            if ($request->has('status_pengiriman')) {
                $pesanan->pengiriman->status_pengiriman = $request->status_pengiriman;

                if ($request->status_pengiriman === 'Sudah Dikirim') {
                    $pesanan->pengiriman->status_pengiriman = 'Sudah Dikirim';
                    $pesanan->status_pesanan = 'Dikirim';
                } elseif ($request->status_pengiriman === 'Sudah Diambil') {
                    $pesanan->pengiriman->status_pengiriman = 'Sudah Diambil';
                    $pesanan->status_pesanan = 'Diambil';
                }
            }
            
            if ($request->has('status_pesanan')) {
            $statusReq = $request->status_pesanan;

            if ($statusReq === 'Sudah Diterima') {
                if (in_array($pesanan->status_pesanan, ['Dikirim', 'Diambil'])) {
                    $pesanan->status_pesanan = $isSewa ? 'Menunggu Pengembalian' : 'Sudah Diterima';
                }
            } elseif ($statusReq === 'Sudah Dikembalikan' && $pesanan->status_pesanan === 'Menunggu Pengembalian') {
                $pesanan->status_pesanan = 'Sudah Dikembalikan';
            } elseif ($statusReq === 'Selesai') {
                if (in_array($pesanan->status_pesanan, ['Sudah Diterima', 'Sudah Dikembalikan'])) {
                    $pesanan->status_pesanan = 'Selesai';
                }
            } else {
                // Status lain langsung di-set
                $pesanan->status_pesanan = $statusReq;
            }
        }
            $pesanan->push(); 
            DB::commit();
            return back()->with('success', 'Status berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui status: ' . $e->getMessage());
        }
    }
}
