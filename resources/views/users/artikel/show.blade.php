@extends('layouts.users-app')
@section('title', $artikel->judul)
@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.artikel.index') }}">Artikel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
                    </ol>
                </nav>

                <!-- Article Header -->
                <div class="card shadow-sm mb-4">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $artikel->thumbnail) }}" class="card-img-top"
                            alt="{{ $artikel->judul }}" style="height: 400px; object-fit: cover;">
                        <div class="card-img-overlay d-flex align-items-end p-4">
                            <div class="bg-dark bg-opacity-75 w-100 p-3 rounded">
                                <h1 class="h2 text-white mb-2">{{ $artikel->judul }}</h1>
                                <p class="text-light mb-0">
                                    <i
                                        class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="artikel-content">
                            {!! $artikel->isi !!}
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-4">
                    <a href="{{ route('user.artikel.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Artikel
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
