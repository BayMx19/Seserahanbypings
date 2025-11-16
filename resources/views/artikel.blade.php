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
                                        <a href="{{ route('welcome.artikel.show', $artikel->slug) }}"
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
        </main><!-- //middle -->
        <!-- partial:parts/_footer.html -->
        @include('components.footer')
        <!-- //site-footer -->

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
