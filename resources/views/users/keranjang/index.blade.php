@extends('layouts.users-app')

@section('title', 'Keranjang Saya')

@section('content')
<section class="section section-keranjang">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold text-blue">Keranjang Saya</h2>
        <hr>

        @php
            $total = $keranjangItems->sum(function($item) {
                return $item->kategoriHarga->harga * $item->qty;
            });
        @endphp

        @if($keranjangItems->isEmpty())
            <div class="text-center">
                <img src="{{ asset('assets/users/images/empty-cart.png') }}" alt="Keranjang Kosong" width="150">
                <p class="mt-3">Keranjang kamu masih kosong.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
            </div>
        @else
            <div class="cart-box p-3 rounded">
                @foreach($keranjangItems as $cart)
                <div class="cart-item-inner">
                    <div class="row d-flex justify-content-between align-items-center">
                        <!-- Gambar -->
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src="{{ asset('storage/' . $cart->produk->gambar) }}" class="img-cart rounded-3" alt="{{ $cart->produk->nama_produk }}">
                        </div>

                        <!-- Nama dan detail produk -->
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <p class="lead fw-normal mb-2"><b>{{ $cart->produk->nama_produk }}</b></p>
                            <p><span class="text-muted">Layanan:</span> {{ $cart->kategoriHarga->kategori }}</p>
                        </div>

                        <!-- Qty Update -->
                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                            <form action="{{ route('keranjang.update', $cart->id) }}" method="POST" class="d-flex align-items-center w-100">
                                @csrf
                                @method('PUT')
                                
                                
                                <input min="1" name="qty" value="{{ $cart->qty }}" type="number" class="form-control form-control-sm text-center" style="width: 60px;" readonly/>

                                

                               
                            </form>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h5 class="mb-0">Rp {{ number_format($cart->kategoriHarga->harga * $cart->qty, 0, ',', '.') }}</h5>
                        </div>

                        <!-- Hapus -->
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <form action="{{ route('keranjang.destroy', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger p-0 border-0 bg-transparent" onclick="return confirm('Hapus produk ini dari keranjang?')">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
            <hr>

            <div class="footer-keranjang">
                <h5 class="text-success fw-bold text-md-end w-100 text-md-right mt-3 mt-md-0">
                    Total Harga : Rp. {{ number_format($total, 0, ',', '.') }}
                </h5>
                <br>
                <div class="mt-3 mt-md-0 button-keranjang">
                    <a href="{{ route('home') }}" class="btn btn-secondary me-3">Kembali Berbelanja</a>
                    <a href="#" class="btn btn-primary">Selesaikan Pesanan</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
