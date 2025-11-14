<!DOCTYPE html>
<html lang="id">

<head>
    <!-- partial:parts/_head.html -->
    <meta charset="utf-8">
    <title>
        {{ $meta_title ?? trim($__env->yieldContent('title') . ' Seserahan byPings - Toko Seserahan Elegan & Eksklusif') }}
    </title>
    <meta name="description"
        content="{{ $meta_description ?? 'Seserahan byPings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.' }}">
    <meta name="keywords"
        content="seserahan, SeserahanbyPings, Seserahan byPings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">

    <meta property="og:title" content="{{ $meta_title ?? 'Seserahan byPings - Toko Seserahan Eksklusif' }}">
    <meta property="og:description"
        content="{{ $meta_description ?? 'Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!' }}">
    <meta property="og:image" content="{{ $meta_image ?? asset('/assets/logo/logo.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/users/css/libs.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/users/css/main.css')}}" />
    <link href="{{ asset('/assets/logo/logo.png')}}" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
</body>

</html>
