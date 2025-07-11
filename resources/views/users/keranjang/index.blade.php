@extends('layouts.users-app')

@section('title', 'Keranjang Saya')

@section('content')
<section class="section pt-1 pb-1">
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
                        
                    </div>
                 
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