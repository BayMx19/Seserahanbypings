<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['pesanan', 'pesanan.pembeli', 'pesanan.detailPesanan.keranjang.produk'])->latest()->get();
        // dd($reviews);
        return view('admin.data-review.index', compact('reviews'));
        
    }

    public function show($id)
    {
    $review = Review::with([
        'pesanan.pembeli',
        'pesanan.pembayaran',
        'pesanan.pengiriman',
        'pesanan.detailPesanan.keranjang.produk',
        'pesanan.detailPesanan.keranjang.layananHarga'
    ])->findOrFail($id);


    return view('admin.data-review.show', compact('review'));    }
}
