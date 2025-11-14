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
</body>

</html>
