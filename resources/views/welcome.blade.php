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
            <section class="section main-section">
                <div class="container">
                    <div class="row">
                        <div class="col col_7 col_desktop-12 order-desktop-2">
                            <div class="photo-list main-photo">
                                <div class="main-photo__fon">

                                </div>
                                <div class="photo-item main-photo-item main-photo-item-1">
                                    <div class="photo-img">
                                        <div class="photo-img__block">
                                            <img src="{{ asset('assets/img/1.jpg')}}" alt="main-page-1">
                                        </div>
                                    </div>
                                    <div class="photo-info wysiwyg"></div>
                                </div>
                                <div class="photo-item main-photo-item main-photo-item-2">
                                    <div class="photo-img">
                                        <div class="photo-img__block">
                                            <img src="{{ asset('assets/img/2.jpg')}}" alt="main-page-2">
                                        </div>
                                    </div>
                                    <div class="photo-info wysiwyg">
                                        <p>Seserahan byPings</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col col_5 col_desktop-12 order-desktop-1">
                            <div class="main-container">
                                <h1 class="h1 main-title">Seserahan Lamaran & Pernikahan Elegan<br><span class="round-border round-border-3">Seserahan byPings</span></h1>
                                <div class="wysiwyg main-description">Hadirkan kesan elegan di hari spesialmu dengan seserahan handmade penuh cinta. Cocok untuk lamaran, tunangan, hingga pernikahan.</div>
                                <a href="{{'login'}}" style="text-decoration: none !important;" type="button" class="btn button-landing">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="advantage" class="section">
                <div class="container">

                    <div class="col text-center" style="margin-bottom: 50px;">
                        <h2 class="h2 title fw-bold" style="margin: 0 !important;">Kenapa Memilih <span class="text-primary text-bold text-blue">Seserahan byPings?</span></h2>
                        <p class="text-muted mb-5">Kami hadir untuk menjadikan momen spesialmu lebih berkesan.</p>
                    </div>

                    <div class="row">
                        <div class="dignity-item col col_4 col_mob-12">
                            <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <img src="{{ asset('assets/users/images/icons/custom.png') }}" alt="Desain Custom" class="img-icon">
                                </div>
                                <h3 class="fw-bold mt-5" style="margin-top: 20px;">Desain Custom</h3>
                                <p class="text-muted">Bisa request tema, warna, dan isi seserahan sesuai keinginan kamu.</p>
                            </div>
                        </div>
                        <div class="dignity-item col col_4 col_mob-12">
                            <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <img src="{{ asset('assets/users/images/icons/fast-delivery.png') }}" alt="Desain Custom" class="img-icon">
                                </div>
                                <h3 class="fw-bold mt-5" style="margin-top: 20px;">Pengiriman Cepat</h3>
                                <p class="text-muted">Proses cepat dan pengiriman tepat waktu ke seluruh Indonesia.</p>
                            </div>
                        </div>
                        <div class="dignity-item col col_4 col_mob-12">
                            <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <img src="{{ asset('assets/users/images/icons/variant.png') }}" alt="Desain Custom" class="img-icon">
                                </div>
                                <h3 class="fw-bold mt-5" style="margin-top: 20px;">Pilihan Beragam</h3>
                                <p class="text-muted">Tersedia berbagai paket seserahan, dari yang minimalis hingga mewah.</p>
                            </div>
                        </div>



                    </div>
                </div>
            </section>

            <section id="experiences" class="section">
                <div class="container">
                    <div class="row">
                        <!-- Foto Emosional -->
                        <div class="col col_6 col_desktop-12">
                            <div class="photo-list emotional-photo">
                                <div class="photo-item emotional-photo__item emotional-photo__item-1">
                                    <div class="photo-img">
                                        <div class="photo-img__block">
                                            <img src="{{ asset('assets/img/3.jpg')}}" alt="moment-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="photo-item emotional-photo__item emotional-photo__item-2">
                                    <div class="photo-img">
                                        <div class="photo-img__block">
                                            <img src="{{ asset('assets/img/9.jpg')}}" alt="moment-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="photo-item emotional-photo__item emotional-photo__item-3">
                                    <div class="photo-img">
                                        <div class="photo-img__block">
                                            <img src="{{ asset('assets/img/5.jpg')}}" alt="moment-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konten Deskripsi -->
                        <div class="col col_6 col_desktop-12">
                            <h2 class="h2 text-bold emotional-title mb-4">Seserahan Bukan Sekadar Hadiah, Tapi Simbol Kasih & Doa</h2>

                            <div class="emotional-list">
                                <div class="emotional-item mb-4">
                                    <div class="emotional-block d-flex">
                                        <div class="emotional-icon me-3">
                                            <img src="{{ asset('assets/img/6.jpg') }}" alt="Makna" width="40">
                                        </div>
                                        <div class="emotional-info">
                                            <h4 class="h4 text-bold emotional-subtitle">Makna dalam Setiap Item</h4>
                                            <p class="text-muted">Setiap isi seserahan punya simbol dan harapan tersendiri untuk pasangan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="emotional-item mb-4">
                                    <div class="emotional-block d-flex">
                                        <div class="emotional-icon me-3">
                                            <img src="{{ asset('assets/img/7.jpg') }}" alt="Kenangan" width="40">
                                        </div>
                                        <div class="emotional-info">
                                            <h4 class="h4 text-bold emotional-subtitle">Menjadi Bagian dari Momen Spesial</h4>
                                            <p class="text-muted">Kami percaya, visual yang indah menciptakan kenangan yang abadi.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="emotional-item">
                                    <div class="emotional-block d-flex">
                                        <div class="emotional-icon me-3">
                                            <img src="{{ asset('assets/img/8.png') }}" alt="Kustom" width="40">
                                        </div>
                                        <div class="emotional-info">
                                            <h4 class="h4 text-bold   emotional-subtitle">Tersedia Paket Kustom & Premium</h4>
                                            <p class="text-muted">Dari konsep hingga eksekusi, kami bantu wujudkan seserahan impianmu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="about-us" class="section">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Kolom Kiri: Teks Tentang Kami -->
                        <div class="col col_6 col_desktop-12">
                            <div class="description-container">
                                <div class="wysiwyg">
                                    <h3 class="h3 title fw-bold mb-4">Tentang <span class="text-primary text-bold text-blue">Seserahan byPings</span></h3>
                                    <p><b class="text-blue">Seserahan byPings</b> hadir untuk membantu kamu menyiapkan seserahan yang elegan, penuh makna, dan sesuai dengan harapan. Kami percaya bahwa setiap seserahan bukan hanya sekadar hadiah, tapi bentuk cinta dan doa terbaik untuk pasangan.</p>
                                    <p>Dengan desain yang bisa dikustom, pilihan paket lengkap, dan pelayanan profesional, kami siap menemani setiap momen spesialmu menjadi lebih berkesan.</p>
                                    <p><i class="fa-solid fa-check"></i> Desain bisa request tema, warna, dan isi
                                    <p><i class="fa-solid fa-check"></i> Pengemasan rapi dan estetik</p>
                                    <p><i class="fa-solid fa-check"></i> Layanan cepat & ramah</p>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Gambar & Ornamen -->
                        <div class="col col_1 col_desktop-12"></div>
                        <div class="col col_5 col_desktop-12">
                            <div class="description-photo">
                                <div class="description-photo-item">

                                    <div class="photo-item description-photo-item-1">
                                        <div class="photo-img">
                                            <div class="photo-img__block rounded shadow">
                                                <img src="{{ asset('assets/logo/logo.png') }}" alt="Seserahan byPings" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="photo-info wysiwyg">
                                            <p class="text-muted small mt-2">"Karena momen spesial pantas mendapatkan kemasan yang istimewa."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="products" class="section section-main__post">
                <div class="container">
                    <div class="row">

                        <div class="col col_12 col_desktop-12">
                            <div class="post-description text-center text-mob-left">
                                <h2 class="h2 title fw-bold" style="margin: 0 !important;">Produk Kami</span></h2>
                                <div class="wysiwyg">
                                    <p>Temukan berbagai pilihan Seserahan, Mahar, dan Box eksklusif untuk hari spesialmu.</p>
                                </div>.
                            </div>
                        </div>

                    </div>

                    <div class="post-slider slider" style="margin-bottom: 50px">
                        <div class="swiper-container post-slider__container">
                            <div class="swiper-wrapper post-slider__wrapper" id="produkSlides">

                            </div>
                            <div class="swiper-pagination slider-pagination  post-slider__pagination"></div>
                        </div>
                    </div>

                </div>
            </section>

            <section id="articles" class="section section-main__post">
                <div class="container">
                    <div class="row">

                        <div class="col col_12 col_desktop-12">
                            <div class="post-description text-center text-mob-left">
                                <h2 class="h2 title fw-bold" style="margin: 0 !important;">Top 5 Artikel</h2>
                                <div class="wysiwyg">
                                    <p>Baca artikel-artikel terbaru dan terpopuler kami.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="artikelCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#artikelCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#artikelCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#artikelCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#artikelCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#artikelCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner" id="artikelSlides">

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#artikelCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#artikelCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </section>

            <section class="section section_secondary-bg">
                <div class="container">
                    <div class="row">

                        <div class="col col_12 col_desktop-12">
                            <div class="subscript-title text-center">
                                <div class="subscript-icon">


                                </div>
                                <h3 class="h3 title text-bold" style="margin-bottom: 20px;">Daftar Sekarang untuk mendapatkan penawaran spesial dari kami!</h3>
                                <a href="{{'register'}}" style="text-decoration: none !important;" type="button" class="btn button-landing">Daftar Sekarang</a>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <!-- Section Kontak -->
            <section id="kontak" class="section kontak-section">
                <div class="container">
                    <div class="post-description text-center text-mob-left">
                        <h2 class="h2 title fw-bold" style="margin: 0 !important;">Temukan Kami</h2>
                        <div class="wysiwyg">
                            <p>Kunjungi workshop kami atau hubungi langsung untuk konsultasi dan pemesanan seserahan terbaikmu.</p>
                        </div>
                    </div>
                    <div class="row" style="justify-content: center !important; align-items:center !important;">

                        <div class=" temukan-kami-map">
                            <div class="col-12" style="width: 100%; align-item: center !important;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2346.7442489700748!2d114.27550098043753!3d-8.427404453796097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMjUnMzMuMyJTIDExNMKwMTYnMzguMyJF!5e0!3m2!1sen!2sid!4v1751963900461!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </main><!-- //middle -->
        <!-- partial:parts/_footer.html -->
        @include('components.footer')
        <!-- //site-footer -->

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('assets/users/js/libs.min.js')}}"></script>
        <script src="{{ asset('assets/users/js/main.js')}}"></script>

    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.wrapper').classList.add('wrapper_ready-load');
        });
        window.onload = () => {
            document.querySelector('.wrapper').classList.add('wrapper_ready-load');
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- Modal Produk -->
    <div class="modal fade" id="modalDetailProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img id="modalImage" src="" alt="Gambar Produk" class="img-fluid rounded">
                    </div>
                    <div class="col-md-7">
                        <h5 class="fw-bold mb-2" id="modalTitle">Nama Produk</h5>
                        <h6 class="fw-bold mb-2" id="modalKategori">Kategori Produk</h6>
                        <p id="modalDescription" class="mb-3">Deskripsi produk akan muncul di sini.</p>

                        <div class="mb-3">
                            <label class="form-label">Pilih Layanan</label>
                            <select class="form-select select-layanan" id="modalSelectLayanan">
                                <option disabled selected>Pilih Layanan</option>
                            </select>
                        </div>
                        <h4 id="modalHarga" class="text-primary fw-bold">Rp -</h4>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Masukkan Jumlah</label>
                            <div class="input-group" style="max-width: 150px;">
                                <button class="btn btn-outline-secondary" type="button" id="btnQtyMinus">-</button>
                                <input type="number" id="modalQty" class="form-control text-center" value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button" id="btnQtyPlus">+</button>
                            </div>
                        </div>
                        <label class="form-label">Total Harga</label>
                        <h4 class="text-primary fw-bold" id="totalHarga">Rp -</h4>


                        <button class="btn btn-primary w-100 mt-3" id="btnTambahKeranjang">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
    $produkData = $produk->map(function($item) {
    return [
    'id' => $item->id,
    'nama' => $item->nama,
    'kategori' => $item->kategori,
    'deskripsi' => \Illuminate\Support\Str::limit($item->deskripsi, 100),
    'gambar' => asset('storage/' . $item->gambar),
    'harga' => $item->harga,
    ];
    });
    $artikelData = $artikels->map(function($item) {
    return [
    'id' => $item->id,
    'judul' => $item->judul,
    'konten' => \Illuminate\Support\Str::limit(strip_tags($item->isi), 50),
    'thumbnail' => asset('storage/' . $item->thumbnail),
    'slug' => $item->slug,
    ];
    });
    @endphp
    <script>
        const produkData = @json($produkData);
        const artikelData = @json($artikelData);
    </script>
    <script>
        function createSlideHTML(item) {
            return `
        <div class="swiper-slide slider-item post-slider__item" data-kategori="${item.kategori}">
            <div class="post-slider__image">
                <img src="${item.gambar}" alt="${item.nama}">
            </div>
            <div class="post-slider__info">
                <h3 class="h3 title mt-5 text-bold">${item.nama}</h3>
                <h6 class="h6 title mt-5 text-bold">Kategori: ${item.kategori}</h6>
                <div class="wysiwyg">
                    <p>${item.deskripsi}</p>
                </div>
                <div class="display-flex justify-between align-center flex-wrap">
                    <button
                        type="button"
                        class="btn btn-list-product mb-2 openModal"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDetailProduk"
                        data-image="${item.gambar}"
                        data-title="${item.nama}"
                        data-kategori="${item.kategori}"
                        data-description="${item.deskripsi}"
                        data-prices='${JSON.stringify(item.harga)}'
                        data-product-id="${item.id}"
                    >
                        Lihat Selengkapnya
                    </button>
                </div>
            </div>
        </div>`;
        }

        function createArticleSlideHTML(item, index) {
            return `
        <div class="carousel-item ${index === 0 ? 'active' : ''}" data-bs-interval="6000">
            <div class="position-relative">
                <img src="${item.thumbnail}" class="d-block w-100" alt="${item.judul}" style="height: 500px; object-fit: cover; filter: brightness(0.7);">
                <div class="carousel-caption d-none d-md-block" style="bottom: 20%; left: 10%; right: 10%; text-align: left;">
                    <div class="bg-dark bg-opacity-75 p-4 rounded" style="max-width: 600px;">
                        <h2 class="fw-bold mb-3 text-white" style="font-size: 2rem;">${item.judul}</h2>
                        <p class="mb-4 text-light" style="font-size: 1.1rem; line-height: 1.6;">${item.konten}</p>
                        <a href="{{ route('welcome.artikel') }}" class="btn btn-primary btn-lg px-4 py-2">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="carousel-caption d-md-none" style="bottom: 10%; left: 5%; right: 5%;">
                    <div class="bg-dark bg-opacity-75 p-3 rounded">
                        <h3 class="fw-bold mb-2 text-white" style="font-size: 1.4rem;">${item.judul}</h3>
                        <p class="mb-3 text-light small">${item.konten.substring(0, 80)}...</p>
                        <a href="{{ route('welcome.artikel') }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>`;
        }

        function renderArticleSlides() {
            const wrapper = document.getElementById('artikelSlides');
            if (!wrapper) return;

            wrapper.innerHTML = '';

            const slidesHTML = artikelData.map((item, index) => createArticleSlideHTML(item, index)).join('');

            wrapper.innerHTML = slidesHTML;
        }

        function renderSlides(kategori) {
            const wrapper = document.getElementById('produkSlides');
            const swiper = document.querySelector('#products .post-slider .swiper-container')?.swiper;
            if (!swiper || !wrapper) return;


            swiper.removeAllSlides();


            const filtered = kategori === 'all' ? produkData : produkData.filter(p => p.kategori === kategori);


            const slidesHTML = filtered.map(createSlideHTML);

            swiper.appendSlide(slidesHTML);
            swiper.update();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selectFilter = document.getElementById('filterKategori');
            renderSlides('all');
            renderArticleSlides();

            selectFilter.addEventListener('change', function() {
                renderSlides(this.value);
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalDetailProduk');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalKategori = document.getElementById('modalKategori');
            const modalDescription = document.getElementById('modalDescription');
            const modalHarga = document.getElementById('modalHarga');
            const modalSelect = document.getElementById('modalSelectLayanan');
            const qtyInput = document.getElementById('modalQty');
            const btnMinus = document.getElementById('btnQtyMinus');
            const btnPlus = document.getElementById('btnQtyPlus');
            let currentProdukId = null;

            document.addEventListener('click', function(e) {
                const button = e.target.closest('.openModal');
                if (!button) return;
                const image = button.getAttribute('data-image');
                const title = button.getAttribute('data-title');
                const kategori = button.getAttribute('data-kategori');
                const description = button.getAttribute('data-description');
                const prices = JSON.parse(button.getAttribute('data-prices'));
                modalImage.src = image;
                modalTitle.textContent = title;
                modalKategori.textContent = 'Kategori: ' + kategori;
                modalDescription.textContent = description;
                modalSelect.innerHTML = '<option disabled selected>Pilih Layanan</option>';
                prices.forEach(price => {
                    const option = document.createElement('option');
                    option.value = price.id;
                    option.setAttribute('data-harga', price.harga);
                    option.textContent = price.layanan;
                    modalSelect.appendChild(option);
                });
                modalHarga.textContent = 'Rp -';
                qtyInput.value = 1;
                currentProdukId = button.getAttribute('data-product-id');
            });


            modalSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedPrice = selectedOption.getAttribute('data-harga');
                modalHarga.textContent = 'Rp ' + parseInt(selectedPrice).toLocaleString('id-ID');
                updateTotalHarga();
            });

            function updateTotalHarga() {
                const selectedOption = modalSelect.options[modalSelect.selectedIndex];
                const selectedPrice = selectedOption ? parseInt(selectedOption.getAttribute('data-harga')) : 0;
                const qty = parseInt(qtyInput.value) || 1;

                const total = selectedPrice * qty;
                document.getElementById('totalHarga').textContent = 'Rp ' + total.toLocaleString('id-ID');
            }
            btnMinus.addEventListener('click', function() {
                let current = parseInt(qtyInput.value) || 1;
                if (current > 1) {
                    qtyInput.value = current - 1;
                }
                updateTotalHarga();

            });

            btnPlus.addEventListener('click', function() {
                let current = parseInt(qtyInput.value) || 1;
                qtyInput.value = current + 1;
                updateTotalHarga();
            });
            document.getElementById('btnTambahKeranjang').addEventListener('click', function() {
                const isAuthenticated = @json(Auth::check());

                if (!isAuthenticated) {
                    window.location.href = "{{ route('login') }}";
                    return;
                }
                const layananHargaId = modalSelect.value;
                const qty = parseInt(document.getElementById('modalQty').value);
                const produkId = currentProdukId;

                if (!layananHargaId || !produkId || qty < 1) {
                    alert('Pilih layanan dan jumlah dengan benar.');
                    return;
                }

                fetch("{{ route('keranjang.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            produk_id: produkId,
                            layanan_harga_id: layananHargaId,
                            qty: qty
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        const badge = document.getElementById('keranjangBadge');
                        let current = parseInt(badge.innerText) || 0;
                        let added = qty || 1;
                        badge.innerText = current + added;
                        badge.classList.remove('d-none');
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalDetailProduk'));
                        modal.hide();

                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Terjadi kesalahan. Coba lagi nanti.");
                    });

            });
        });
    </script>
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
