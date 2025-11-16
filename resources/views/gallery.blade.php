<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <!-- TITLE SEO-FRIENDLY -->
    <title>
        {{ $meta_title ?? 'Seserahan byPings | Toko Seserahan Lamaran & Pernikahan Elegan di Banyuwangi' }}
    </title>

    <!-- DESCRIPTION KUAT UNTUK KEYWORD -->
    <meta name="description" content="{{ 
        $meta_description ??
        'Seserahan byPings adalah penyedia seserahan lamaran, tunangan, dan pernikahan di Banyuwangi. Hadir dengan desain elegan, custom, harga terjangkau dan pengiriman ke seluruh Indonesia.' 
    }}">

    <!-- KEYWORDS (tidak lagi super penting, tapi tetap aman dipakai) -->
    <meta name="keywords" content="seserahanbypings, seserahan di banyuwangi, seserahan bypings, seserahan banyuwangi, toko seserahan, seserahan lamaran, seserahan pernikahan, jasa seserahan, hantaran pernikahan, seserahan murah, seserahan elegan">

    <!-- OPEN GRAPH -->
    <meta property="og:title" content="{{ $meta_title ?? 'Seserahan byPings – Toko Seserahan Elegan & Custom' }}">
    <meta property="og:description" content="{{ $meta_description ?? 'Toko seserahan lamaran & pernikahan dengan desain eksklusif dan custom. Tersedia berbagai paket seserahan lengkap.' }}">
    <meta property="og:image" content="{{ $meta_image ?? asset('/assets/logo/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Seserahan byPings – Toko Seserahan Elegan & Custom">
    <meta name="twitter:description" content="Desain seserahan lamaran & pernikahan eksklusif, bisa custom tema & warna.">
    <meta name="twitter:image" content="{{ $meta_image ?? asset('/assets/logo/logo.png') }}">

    <!-- VIEWPORT & ETC -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Canonical tag (PENTING BANGET) -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/users/css/libs.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/users/css/main.css')}}">
    <link rel="shortcut icon" href="{{ asset('/assets/logo/logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .text-blue {
            color: #696cff !important
        }
    </style>
</head>

<body>
    <div id="wrapper" class="wrapper">
        <!-- partial:parts/_header.html -->
        @include('components.header')
        <!-- //site-header -->

        <!-- partial -->
        <main id="main" class="main">
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

                    @if($testimoni->isEmpty() )
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


        </main><!-- //middle -->
        <!-- partial:parts/_footer.html -->
        @include('components.footer')
        <!-- //site-footer -->

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
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
    </div>
        <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
        "@type": "Question",
        "name": "Apa itu Seserahan byPings?",
        "acceptedAnswer": {
            "@type": "Answer",
            "text": "Seserahan byPings adalah penyedia seserahan lamaran, tunangan, dan pernikahan dengan desain elegan dan bisa custom sesuai permintaan."
        }
        },
        {
        "@type": "Question",
        "name": "Apakah Seserahan byPings bisa custom?",
        "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ya, kamu bisa request tema, warna, isi, serta konsep sesuai kebutuhan acara lamaran atau pernikahan."
        }
        },
        {
        "@type": "Question",
        "name": "Apakah Seserahan byPings melayani pengiriman seluruh Indonesia?",
        "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ya, pengiriman tersedia ke seluruh Indonesia dengan packing aman dan estetik."
        }
        }
    ]
    }
    </script>
        <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Store",
    "name": "Seserahan byPings",
    "image": "{{ asset('/assets/logo/logo.png') }}",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Banyuwangi",
        "addressCountry": "ID"
    },
    "url": "{{ url('/') }}",
    "telephone": "+62"
    }
    </script>


</body>

</html>
