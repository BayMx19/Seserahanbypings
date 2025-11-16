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
                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb" class="mb-4">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('welcome.artikel') }}">Artikel</a>
                                    </li>
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
                                <a href="{{ route('welcome.artikel') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Artikel
                                </a>
                            </div>
                        </div>
                    </div>
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
