<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function simpanReview(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:t_pesanan,id',
            'produk_id' => 'required|exists:m_produk,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:500',
        ]);

        // Simpan review
        Review::create([
            'pesanan_id' => $request->pesanan_id,
            'produk_id' => $request->produk_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return redirect()->back()->with('success', 'Review berhasil dikirim!');
    }

}
