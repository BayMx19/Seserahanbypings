@extends('layouts.users-app')

@section('title', 'Riwayat Pesanan')

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
        
        <h2 class="text-center mb-4 fw-bold text-blue">Riwayat Pesanan</h2>
        <hr>
        

<!-- Tabs -->
<ul class="nav nav-tabs" id="pesananTabs" role="tablist">
    @foreach ($statusAsli as $index => $status)
        @php
            $jumlahPesanan = count($pesananByStatus[$status]);
        @endphp
        <li class="nav-item" role="presentation">
            <button class="nav-link @if ($index === 0) active @endif"
                id="tab-{{ $index }}"
                data-bs-toggle="tab"
                data-bs-target="#status-{{ $index }}"
                type="button"
                role="tab"
                aria-controls="status-{{ $index }}"
                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                {{ $status }}
                @if ($jumlahPesanan > 0)
                    <span class="badge bg-danger text-white">
                        {{ $jumlahPesanan }}
                    </span>
                @endif
            </button>
        </li>
    @endforeach
</ul>


        <!-- Tab Contents -->
<div class="tab-content mt-4" id="pesananTabsContent">
    @foreach ($statusAsli as $index => $status)
        <div class="tab-pane fade @if ($index === 0) show active @endif"
            id="status-{{ $index }}"
            role="tabpanel"
            aria-labelledby="tab-{{ $index }}">

            @php
                $daftarPesanan = $pesananByStatus[$status];
            @endphp

            @forelse ($daftarPesanan as $pesanan)
            @php
            $isSewa = $pesanan->detailPesanan->contains(function ($detail) {
                return in_array($detail->keranjang->layananHarga->layanan, ['Sewa + Jasa Hias', 'Sewa Box']);
            });
            @endphp
                <div class="accordion mb-3" id="accordion-{{ $index }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                            <button class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $index }}-{{ $loop->index }}"
                                aria-expanded="false"
                                aria-controls="collapse-{{ $index }}-{{ $loop->index }}">
                                <div>
                                    <strong>Kode Pesanan:</strong> {{ $pesanan->kode_invoice }} <br>
                                    <small >Tanggal: {{ \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->translatedFormat('d F Y') }}</small>

                                </div>
                            <span class="badge badge-status ms-auto">
                                {{ $statusLabels[$pesanan->status_pesanan] ?? $pesanan->status_pesanan }}
                            </span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $index }}-{{ $loop->index }}"
                            class="accordion-collapse collapse"
                            aria-labelledby="heading-{{ $loop->index }}"
                            data-bs-parent="#accordion-{{ $index }}">
                            <div class="accordion-body">
                                @foreach ($pesanan->detailPesanan as $detail)
                                    @php
                                        $keranjang = $detail->keranjang;
                                        $produk = $keranjang->produk;
                                        $layanan = $keranjang->layananHarga;
                                        $gambar = $produk->gambar ?? 'https://via.placeholder.com/80x80';
                                        $review = $pesanan->review()->where('produk_id', $produk->id)->first();
                                    @endphp
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ asset('storage/' . $gambar) }}" alt="Produk" class="rounded" width="80" height="80">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-1">{{ $produk->nama }}</h6>
                                            <small class="text-muted">{{ $layanan->layanan }}</small><br>
                                            <small>Jumlah: {{ $keranjang->qty }} | Harga: Rp{{ number_format($layanan->harga, 0, ',', '.') }}</small>
                                        </div>
                                        <div>
                                            <strong>Rp{{ number_format($keranjang->qty * $layanan->harga, 0, ',', '.') }}</strong>
                                        </div>
                                    </div>
                                    @if ($status === 'Selesai')
                                        @if ($review)
                                            <small class="d-block mt-1"><span class="text-bold text-blue">Rating :</span></small>
                                            <div class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    {!! $i <= $review->rating ? '★' : '☆' !!}
                                                @endfor
                                            </div>
                                            @if ($review->review_text)
                                                <small class="d-block mt-1"><span class="text-bold text-blue">Ulasan :</span> "{{ $review->review_text }}"</small>
                                            @endif
                                        @else
                                            <button class="btn btn-sm btn-outline-primary mt-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal-{{ $pesanan->id }}-{{ $produk->id }}">
                                                Beri Review
                                            </button>
                                        @endif
                                    @endif
                                    @if (!$loop->last)
                                        <hr>
                                    @endif
                                    
                                @endforeach
                                <hr>
                                @if ($pesanan->pengiriman->metode_pengiriman === 'Dikirim')
                                    <div class="text-end">
                                        <p class="mb-1">Biaya Pengiriman: <strong>Rp {{ number_format(10000, 0, ',', '.') }}</strong></p>
                                    </div>
                                @endif
                                <div class="text-end">
                                    <p class="mb-1">Biaya Layanan: <strong>Rp {{ number_format(4000, 0, ',', '.') }}</strong></p>
                                </div>
                                <div class="text-end text-blue fw-bold mt-3">
                                    Total: Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </div>
                                @if ($status === 'Dikirim')
                                    <div class="text-end mt-3">
                                        <form action="{{ route('pesanan.update-status-diterima', $pesanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin pesanan sudah diterima?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">
                                                Sudah Diterima
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                @if ($status === 'Sudah Diterima' && !$isSewa)
                                    <div class="text-end mt-3">
                                        <form action="{{ route('pesanan.selesaikan', $pesanan->id) }}" method="POST" onsubmit="return confirm('Selesaikan pesanan ini?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">
                                                Selesaikan Pesanan
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                @if ($status === 'Sudah Dikembalikan' && $isSewa)
                                    <div class="text-end mt-3">
                                        <form action="{{ route('pesanan.selesaikan', $pesanan->id) }}" method="POST" onsubmit="return confirm('Selesaikan pesanan ini?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">
                                                Selesaikan Pesanan
                                            </button>
                                        </form>
                                    </div>
                                @endif




                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                <img src="{{ asset('assets/users/images/empty-cart.png') }}" alt="Keranjang Kosong" width="150">
                <p class="mt-3">Belum Ada Pesanan.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
            </div>
            @endforelse
        </div>
    @endforeach


        
    </div>
</section>
@endsection

@push('modals')
    @foreach ($statusAsli as $index => $status)
        @php $daftarPesanan = $pesananByStatus[$status]; @endphp
        @foreach ($daftarPesanan as $pesanan)
            @foreach ($pesanan->detailPesanan as $detail)
                @php
                    $keranjang = $detail->keranjang;
                    $produk = $keranjang->produk;
                    $review = $pesanan->review()->where('produk_id', $produk->id)->first();
                @endphp

                @if ($status === 'Selesai' && !$review)
                    <div class="modal fade" id="reviewModal-{{ $pesanan->id }}-{{ $produk->id }}" tabindex="-1" aria-labelledby="reviewModalLabel-{{ $pesanan->id }}-{{ $produk->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('pesanan.review.simpan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <input type="hidden" name="rating" id="rating-value-{{ $pesanan->id }}-{{ $produk->id }}" value="0">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reviewModalLabel-{{ $pesanan->id }}-{{ $produk->id }}">Beri Penilaian untuk {{ $produk->nama }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3 text-center">
                                            <label class="form-label d-block mb-2">Rating:</label>
                                            <div class="star-rating d-inline-flex" data-target="rating-value-{{ $pesanan->id }}-{{ $produk->id }}">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="star" data-value="{{ $i }}">&#9733;</span>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="review_text" class="form-label">Ulasan:</label>
                                            <textarea name="review_text" class="form-control" rows="3" placeholder="Tulis ulasan Anda..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn" style="background-color: #696cff; color: white;">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    @endforeach

    {{-- CSS & JS Rating --}}
    <style>
        .star-rating .star {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating .star.active,
        .star-rating .star.hovered {
            color: gold;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".star-rating").forEach(ratingEl => {
                const targetInputId = ratingEl.getAttribute("data-target");
                const input = document.getElementById(targetInputId);
                const stars = ratingEl.querySelectorAll(".star");

                stars.forEach((star, index) => {
                    star.addEventListener("click", () => {
                        const rating = star.getAttribute("data-value");
                        input.value = rating;

                        stars.forEach((s, i) => {
                            s.classList.toggle("active", i < rating);
                        });
                    });

                    star.addEventListener("mouseover", () => {
                        stars.forEach((s, i) => {
                            s.classList.toggle("hovered", i <= index);
                        });
                    });

                    star.addEventListener("mouseout", () => {
                        stars.forEach(s => s.classList.remove("hovered"));
                    });
                });
            });
        });
    </script>
@endpush
