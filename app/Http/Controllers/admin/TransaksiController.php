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
    
    $pesanan = Pesanan::with(['pembayaran', 'pengiriman', 'detailPesanan.keranjang.layananHarga', 'detailPesanan.keranjang.produk'])->findOrFail($id);

    DB::beginTransaction();
    try {
        if ($request->has('status_pembayaran')) {
            $pesanan->pembayaran->status_pembayaran = $request->status_pembayaran;
        }

        $isSewa = $pesanan->detailPesanan->contains(fn ($detail) =>
            in_array($detail->keranjang->layananHarga->layanan, ['Sewa + Jasa Hias', 'Sewa Box'])
        );

        $isBeli = $pesanan->detailPesanan->contains(fn ($detail) =>
            in_array($detail->keranjang->layananHarga->layanan, ['Beli', 'Jasa'])
        );

        $metodePengiriman = $pesanan->pengiriman->metode_pengiriman;
        $statusPengiriman = $request->status_pengiriman ?? null;
        $statusPesanan = $request->status_pesanan ?? null;

        // Handle status pengiriman
        if ($statusPengiriman) {
            $pesanan->pengiriman->status_pengiriman = $statusPengiriman;

            if ($metodePengiriman === 'Dikirim') {
                if ($statusPengiriman === 'Sudah Dikirim' && $pesanan->status_pesanan === 'Diproses') {
                    $pesanan->status_pesanan = 'Dikirim';
                }
            } elseif ($metodePengiriman === 'Ambil di Tempat') {
                if ($statusPengiriman === 'Belum Diambil' && $pesanan->status_pesanan === 'Diproses') {
                    $pesanan->status_pesanan = 'Siap Diambil';
                } elseif ($statusPengiriman === 'Sudah Diambil' && $pesanan->status_pesanan === 'Siap Diambil') {
                    $pesanan->status_pesanan = 'Sudah Diterima';
                }
            }
        }

        // Handle status pesanan manual
        if ($statusPesanan) {
            switch ($statusPesanan) {
                case 'Diproses':
                    if ($pesanan->status_pesanan === 'Pending') {
                        $pesanan->status_pesanan = 'Diproses';
                    }
                    break;

                case 'Sudah Diterima':
                    if ($metodePengiriman === 'Dikirim' && $pesanan->status_pesanan === 'Dikirim') {
                        $pesanan->status_pesanan = 'Sudah Diterima';
                    } elseif ($metodePengiriman === 'Ambil di Tempat' && $pesanan->status_pesanan === 'Siap Diambil') {
                        $pesanan->status_pesanan = 'Sudah Diterima';
                    }
                    break;

                case 'Menunggu Pengembalian':
                    if ($isSewa && $pesanan->status_pesanan === 'Sudah Diterima') {
                        $pesanan->status_pesanan = 'Menunggu Pengembalian';
                    }
                    break;

                case 'Sudah Dikembalikan':
                    if ($isSewa && $pesanan->status_pesanan === 'Menunggu Pengembalian') {
                        $pesanan->status_pesanan = 'Sudah Dikembalikan';
                    }
                    break;

                case 'Selesai':
                    if ($isSewa && $pesanan->status_pesanan === 'Sudah Dikembalikan') {
                        $pesanan->status_pesanan = 'Selesai';
                        foreach ($pesanan->detailPesanan as $detail) {
                            $produk = $detail->keranjang->produk;

                            if ($produk) {
                                $produk->stok -= $detail->keranjang->qty;

                                if ($produk->stok < 0) {
                                    $produk->stok = 0;
                                }

                                $produk->save();
                            }
                        }
                    } elseif ($isBeli && $pesanan->status_pesanan === 'Sudah Diterima') {
                        $pesanan->status_pesanan = 'Selesai';

                        foreach ($pesanan->detailPesanan as $detail) {
                            $produk = $detail->keranjang->produk;

                            if ($produk) {
                                $produk->stok -= $detail->keranjang->qty;

                                if ($produk->stok < 0) {
                                    $produk->stok = 0;
                                }

                                $produk->save();
                            }
                        }
                    }
                    break;
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
