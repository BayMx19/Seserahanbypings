@extends('layouts.users-app')
@section('title', 'Gallery')
@push('modals')
<!-- Modal untuk melihat gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Gallery Image" class="img-fluid rounded">
                <div class="mt-3">
                    <h5 id="modalTitle"></h5>
                    <p id="modalDescription" class="text-muted" style="word-break: break-word; white-space: normal;"></p>
                    <div id="modalMeta" class="small text-muted"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush
@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="post-description text-center text-mob-left mb-5">
                    <h2 class="h2 title fw-bold" style="margin: 0 !important;">Gallery Seserahan byPings</h2>
                    <div class="wysiwyg">
                        <p>Lihat koleksi foto testimoni dan produk seserahan kami yang telah dipercaya oleh banyak pasangan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Kategori -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Filter kategori">
                        <input type="radio" class="btn-check" name="kategoriFilter" id="all" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="all">Semua</label>

                        <input type="radio" class="btn-check" name="kategoriFilter" id="testimoni" autocomplete="off">
                        <label class="btn btn-outline-primary" for="testimoni">Testimoni</label>

                        <input type="radio" class="btn-check" name="kategoriFilter" id="produk" autocomplete="off">
                        <label class="btn btn-outline-primary" for="produk">Produk</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row" id="galleryContainer">
            @foreach($testimoni as $item)
            <div class="col-lg-4 col-md-6 col-12 mb-4 gallery-item" data-kategori="testimoni">
                <div class="card h-100 shadow-sm gallery-card" style="cursor: pointer;" onclick="openImageModal('{{ asset('storage/' . $item->gambar) }}', '{{ $item->judul }}', '{{ $item->deskripsi }}', '{{ $item->lokasi }}', '{{ $item->tanggal_event ? \Carbon\Carbon::parse($item->tanggal_event)->format('d M Y') : '' }}')">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                            alt="{{ $item->judul }}" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <div class="bg-dark bg-opacity-75 w-100 p-3">
                                <span class="badge bg-primary mb-2">Testimoni</span>
                                <h5 class="card-title text-white mb-2">{{ $item->judul }}</h5>
                                @if($item->lokasi)
                                <p class="card-text text-light small mb-1">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $item->lokasi }}
                                </p>
                                @endif
                                @if($item->tanggal_event)
                                <p class="card-text text-light small">
                                    <i class="fas fa-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_event)->format('d M Y') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($item->deskripsi)
                    <div class="card-body">
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach

            @foreach($foto as $item)
            <div class="col-lg-4 col-md-6 col-12 mb-4 gallery-item" data-kategori="produk">
                <div class="card h-100 shadow-sm gallery-card" style="cursor: pointer;" onclick="openImageModal('{{ asset('storage/' . $item->gambar) }}', '{{ $item->judul }}', '{{ $item->deskripsi }}', '{{ $item->lokasi }}', '{{ $item->tanggal_event ? \Carbon\Carbon::parse($item->tanggal_event)->format('d M Y') : '' }}')">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                            alt="{{ $item->judul }}" style="height: 250px; object-fit: cover;">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <div class="bg-dark bg-opacity-75 w-100 p-3">
                                <span class="badge bg-success mb-2">Produk</span>
                                <h5 class="card-title text-white mb-2">{{ $item->judul }}</h5>
                                @if($item->lokasi)
                                <p class="card-text text-light small mb-1">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $item->lokasi }}
                                </p>
                                @endif
                                @if($item->tanggal_event)
                                <p class="card-text text-light small">
                                    <i class="fas fa-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_event)->format('d M Y') }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($item->deskripsi)
                    <div class="card-body">
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($testimoni->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>Tidak ada gallery</h5>
                    <p>Belum ada foto yang dipublikasikan saat ini.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
<script>
    function openImageModal(imageSrc, title, description, location, date) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDescription').textContent = description;

        let metaHtml = '';
        if (location) {
            metaHtml += '<i class="fas fa-map-marker-alt me-1"></i>' + location + ' ';
        }
        if (date) {
            metaHtml += '<i class="fas fa-calendar-alt me-1"></i>' + date;
        }
        document.getElementById('modalMeta').innerHTML = metaHtml;

        const modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }

    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('input[name="kategoriFilter"]');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('change', function() {
                const selectedCategory = this.id;

                galleryItems.forEach(item => {
                    if (selectedCategory === 'all' || item.dataset.kategori === selectedCategory) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
