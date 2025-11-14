@extends('layouts.users-app')
@section('title', 'Artikel')
@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="post-description text-center text-mob-left mb-5">
                    <h2 class="h2 title fw-bold" style="margin: 0 !important;">Artikel</h2>
                    <div class="wysiwyg">
                        <p>Baca artikel-artikel terbaru dan terpopuler tentang seserahan dan pernikahan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($artikels as $artikel)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $artikel->thumbnail) }}" class="card-img-top"
                            alt="{{ $artikel->judul }}" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <div class="bg-dark bg-opacity-75 w-100 p-3">
                                <h5 class="card-title text-white mb-2">{{ $artikel->judul }}</h5>
                                <p class="card-text text-light small">
                                    {{ $artikel->kategori }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold">{{ $artikel->judul }}</h6>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($artikel->ringkasan), 150) }}
                        </p>
                        <div class="mt-auto">
                            <small class="text-muted d-block mb-2">
                                <i
                                    class="fas fa-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                            </small>
                            <a href="{{ route('user.artikel.show', $artikel->slug) }}"
                                class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-eye me-1"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        @if($artikels->hasPages())
                        {{ $artikels->links() }}
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

        @if($artikels->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>Tidak ada artikel</h5>
                    <p>Belum ada artikel yang dipublikasikan saat ini.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
