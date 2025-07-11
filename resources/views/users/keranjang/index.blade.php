@extends('layouts.users-app')

@section('title', 'Keranjang Saya')

@section('content')
<section class="section section-keranjang">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold text-blue">Keranjang Saya</h2>
        <hr>
        @php
            $dummyCart = [
                [
                    'id' => 1,
                    'name' => 'ASTRA',
                    'price' => 80000,
                    'quantity' => 1,
                    'image' => 'assets/img/1.jpg'
    ],
                [
                    'id' => 2,
                    'name' => 'ASTREA',
                    'price' => 90000,
                    'quantity' => 1,
                    'image' => 'assets/img/2.jpg'
                ]
            ];
            $total = collect($dummyCart)->sum(function($item) {
                return $item['price'] * $item['quantity'];
            });
        @endphp

        @if(count($dummyCart) == 0)
            <div class="text-center">
                <img src="{{ asset('assets/users/images/empty-cart.png') }}" alt="Keranjang Kosong" width="150">
                <p class="mt-3">Keranjang kamu masih kosong.</p>
                <a href="#" class="btn btn-primary mt-3">Belanja Sekarang</a>
            </div>
        @else
            <div class="cart-box p-3 rounded ">
                
                @foreach($dummyCart as $cart)
                     <div class="cart-item-inner">
                        <div class="row d-flex justify-content-between align-items-center">
                        <!-- Gambar -->
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src="{{ asset($cart['image']) }}" class="img-fluid rounded-3" alt="{{ $cart['name'] }}">
                        </div>

                        <!-- Nama dan detail produk -->
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <p class="lead fw-normal mb-2">{{ $cart['name'] }}</p>
                            <p><span class="text-muted">Qty: </span>{{ $cart['quantity'] }}</p>
                        </div>

                        <!-- Button + / - -->
                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                            </button>

                            <input min="1" name="quantity[]" value="{{ $cart['quantity'] }}" type="number" class="form-control form-control-sm" />

                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h5 class="mb-0">Rp {{ number_format($cart['price'] * $cart['quantity'], 0, ',', '.') }}</h5>
                        </div>

                        <!-- Hapus -->
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="#" class="text-danger">
                            <i class="fas fa-trash fa-lg"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    <br>    
                @endforeach
            </div>
            <hr>

            <div class="footer-keranjang">
                <h5 class="text-success fw-bold text-md-end w-100 text-md-right mt-3 mt-md-0 ">Total Harga : Rp. {{ number_format($total, 0, ',', '.') }}</h5>
                <br>
                <div class="mt-3 mt-md-0 button-keranjang">
                    <a href="{{'/home'}}" class="btn btn-secondary" style="margin-right: 20px !important;">Kembali Berbelanja</a>
                    <a href="#" class="btn btn-primary">Selesaikan Pesanan</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection