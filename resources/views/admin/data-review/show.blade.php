@extends('layouts.admin-app')

@section('title', 'Detail Review')

@section('content')
<h3 class="text-bold mb-4">Detail Review</h3>

<div class="card mt-5 p-4">
  <h5 class="text-bold mb-0"><i class="bx bx-star"></i> Review Pengguna</h5>
  <hr>
  @php
          $firstDetail = $review->pesanan->detailPesanan->first();
  @endphp
  <p><strong>Nama Produk :</strong> {{ $firstDetail ? ($firstDetail->keranjang->produk->nama ?? '-') : '-' }}</p>
  <p><strong>Rating :</strong>
    @for ($i = 1; $i <= 5; $i++)
      @if ($i <= $review->rating)
        <i class="fas fa-star text-warning"></i>
      @else
        <i class="far fa-star text-muted"></i>
      @endif
    @endfor
    ({{ $review->rating }}/5)
  </p>
  <p><strong>Ulasan :</strong> {{ $review->review_text }}</p>
  <p><strong>Waktu Review:</strong> {{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d M Y H:i') }}</p>
</div>
<div style="text-align: center; margin-top: 10px;">
        <a href="{{ route('admin.data-review.index') }}"><button class="btn btn-batal">Kembali</button></a>
</div>
@endsection
