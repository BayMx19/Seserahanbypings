@extends('layouts.users-app')

@section('title', 'Keranjang Saya')

@section('content')
<section class="section section-keranjang">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="text-center mb-4 fw-bold text-blue">Keranjang Saya</h2>
        <hr>

        @php
            $total = $keranjangItems->sum(function($item) {
                return $item->layananHarga->harga * $item->qty;
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
                            <img src="{{ asset('storage/' . $cart->produk->gambar) }}" class="img-cart rounded-3" alt="{{ $cart->produk->nama }}">
                        </div>

                        <!-- Nama dan detail produk -->
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <p class="lead fw-normal mb-2"><b>{{ $cart->produk->nama }}</b></p>
                            <p style="margin-bottom: 0px !important;"><span class="text-muted" >Kategori:</span> {{ $cart->produk->kategori }}</p>
                            <p><span class="text-muted">Layanan:</span> {{ $cart->layananHarga->layanan }}</p>
                        </div>

                        <!-- Qty Update -->
                        <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                            <input min="1" name="qty" value="{{ $cart->qty }}" type="number" class="form-control form-control-sm text-center" style="width: 60px;" readonly/>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h5 class="mb-0">Rp {{ number_format($cart->layananHarga->harga * $cart->qty, 0, ',', '.') }}</h5>
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
                    <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('checkout-form').submit();">Checkout Pesanan</a>
                    <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST" style="display: none;">
                        @csrf
                    </form>                
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
@push('scripts')
<script>
    function checkoutSubmit() {
        if (confirm('Yakin ingin menyelesaikan pesanan ini?')) {
            document.getElementById('checkout-form').submit();
        }
    }
</script>
@endpush
