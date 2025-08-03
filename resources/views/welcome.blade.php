<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- partial:parts/_head.html -->
    <meta charset="utf-8">
<title>Seserahan byPings - Toko Seserahan Elegan & Eksklusif</title>
<meta name="description" content="Seserahan byPings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.">
<meta name="keywords" content="seserahan, SeserahanbyPings,  Seserahan byPings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">
<meta property="og:title" content="Seserahan byPings - Toko Seserahan Eksklusif">
<meta property="og:description" content="Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!">
<meta property="og:image" content="{{ asset('/assets/logo/logo.png')}}">
<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=0">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('assets/users/css/libs.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/users/css/main.css')}}"/>
<link href="{{ asset('/assets/logo/logo.png')}}" rel="shortcut icon" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
            <header id="header" class="header">
                <div class="container">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="index.html" class="site-logo__link">
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ asset('assets/logo/logo.png')}}">
                                    <img class="site-logo__img" src="{{ asset('/assets/logo/logo.png')}}" alt="logo" style="width: 50px!important;"/>
                                    <source srcset="{{ asset('assets/logo/logo.png')}}" style="width: 50px !important;">
                            </picture>
                        </a>
                    </div>
                    <div class="header-mobile">

                        <div class="header-nav">
                            <div class="nav-toggle"><span class="nav-toggle__link"></span><span class="nav-toggle__link"></span><span
                                    class="nav-toggle__link"></span></div>
                            <div class="header-nav__container">
                                <div class="header-nav__menu">
                                    <nav class="nav">
                                        <ul class="nav__list">
                                            <li class="nav__item">@auth
                                                    <a href="{{ url('/home') }}" class="nav__link">Home</a>
                                                @else
                                                    <a href="{{ url('/') }}" class="nav__link">Home</a>
                                                @endauth
                                            </li>
                                            <li class="nav__item"><a href="#about-us" class="nav__link">Tentang</a></li>
                                            <li class="nav__item"><a href="#products" class="nav__link">Produk</a></li>
                                            
                                        </ul><!-- //nav__list -->
                                    </nav><!-- //nav -->
                                </div>
                                <div class="header-nav__info">
                                    <a href="{{'login'}}" class="text-bold">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- //container -->
            </header><!-- //site-header -->

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
                                        <div class="photo-info wysiwyg"><p>Seserahan byPings</p></div>

                                    </div>

                                </div>
                            </div>
                            <div class="col col_5 col_desktop-12 order-desktop-1">
                                <div class="main-container">
                                    <h1 class="h1 main-title">Bingkisan Istimewa<br><span class="round-border round-border-3">Seserahan byPings</span></h1>
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
                                            <img src="{{ asset('assets/img/4.jpg')}}" alt="moment-2">
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
                        <div class="row" >
                            
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
                <section class="section section_secondary-bg">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col col_12 col_desktop-12">
                                <div class="subscript-title text-center">
                                    <div class="subscript-icon">
                                        
                                    
                                    </div>
                                    <h3 class="h3 title text-bold" style="margin-bottom: 20px;">Daftar Sekarang  untuk mendapatkan penawaran spesial dari kami!</h3>
                                    <a href="{{'register'}}" style="text-decoration: none !important;" type="button" class="btn button-landing">Daftar Sekarang</a>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </section>
                <!-- Section Kontak -->
                <section id="kontak" class="section kontak-section" >
                    <div class="container" >
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
    <footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__container">
                <div class="row align-center">
                    <div class="col col_6 col_desktop-12">
                        <div class="row">

                            <div class="col col_12 col_desktop-12 col_mob-12 col_mob-p-12">
                                <div class="footer-logo text-desktop-center">
                                    <a href="index.html" class="site-logo site-logo__link">
                                        <picture>
                                            <source media="(max-width: 767px)" srcset="{{ asset('assets/logo/logo.png')}}">
                                                <img class="site-logo__img" src="{{ asset('/assets/logo/logo.png')}}" alt="logo" style="width: 50px!important;"/>
                                                <source srcset="{{ asset('assets/logo/logo.png')}}" style="width: 50px !important;">
                                        </picture>
                                    </a>
                                    <br>
                                    <div class="wysiwyg">
                                        <p>Seserahan elegan, penuh makna, dan bisa custom. Temani momen spesialmu bersama<br><b class="text-blue text-bold">Seserahan byPings</b>.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    
                    <div class="col col_6 col_desktop-6 col_mob-12">
                        <ul class="contact-list icon-list">
                            <li class="contact-item icon-text icon-position-right address">
                                Jl. Sraten - Tapanrejo, Kabupaten Banyuwangi, Jawa Timur 68472
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <g opacity="0.8"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 19.5C16.1421 19.5 19.5 16.1421 19.5 12C19.5 7.85786 16.1421 4.5 12 4.5C7.85786 4.5 4.5 7.85786 4.5 12C4.5 16.1421 7.85786 19.5 12 19.5ZM12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"/> <path d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0.75C12.4142 0.75 12.75 1.08579 12.75 1.5V11.25H22.5C22.9142 11.25 23.25 11.5858 23.25 12C23.25 12.4142 22.9142 12.75 22.5 12.75H12.75V22.5C12.75 22.9142 12.4142 23.25 12 23.25C11.5858 23.25 11.25 22.9142 11.25 22.5V12.75H1.5C1.08579 12.75 0.75 12.4142 0.75 12C0.75 11.5858 1.08579 11.25 1.5 11.25H11.25V1.5C11.25 1.08579 11.5858 0.75 12 0.75Z"/> </g> </svg>
                            </li>
                                        <li class="contact-item icon-text icon-position-right">
                                            <a href="https://wa.me/+6281913457542" class="contact-link">WA: 081913457542</a>
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <g opacity="0.8"> <path d="M3 8.25C3 6.17893 4.61177 4.5 6.6 4.5H17.4C19.3882 4.5 21 6.17893 21 8.25V13.875C21 15.9461 19.3882 17.625 17.4 17.625H8.4L3 19.5V8.25Z"/> <path d="M6 9.75C6 9.33579 6.33579 9 6.75 9H17.25C17.6642 9 18 9.33579 18 9.75C18 10.1642 17.6642 10.5 17.25 10.5H6.75C6.33579 10.5 6 10.1642 6 9.75Z" fill="white"/> <path d="M6 12.75C6 12.3358 6.33579 12 6.75 12H14.25C14.6642 12 15 12.3358 15 12.75C15 13.1642 14.6642 13.5 14.25 13.5H6.75C6.33579 13.5 6 13.1642 6 12.75Z" fill="white"/> </g> </svg>
                                        </li>
                                        <li class="contact-item icon-text icon-position-right instagram">
                                        <a href="https://www.instagram.com/seserahan_by_pings/" target="_blank" class="contact-link">
                                            Instagram : seserahan_by_pings
                                            <svg class="icon" width="24" height="24" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor"> <g opacity="0.8">
                                            <path d="M224,202.66A53.34,53.34,0,1,0,277.34,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.78-30.78C293.27,124,224,124,224,124s-69.27,0-93.93,6.84a54,54,0,0,0-30.78,30.78C93.5,148.73,93.5,224,93.5,224s0,75.27,6.84,99.93a54,54,0,0,0,30.78,30.78C154.73,355.5,224,355.5,224,355.5s69.27,0,93.93-6.84a54,54,0,0,0,30.78-30.78c6.84-24.66,6.84-99.93,6.84-99.93S355.55,148.73,348.71,161.66ZM224,338c-62.79,0-114-51.21-114-114S161.21,110,224,110,338,161.21,338,224,286.79,338,224,338ZM370.66,137a19.47,19.47,0,1,1-19.47-19.47A19.47,19.47,0,0,1,370.66,137Z"/>
                                            </g></svg>
                                        </a>
                                        </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <span class="copyright text-center">Copyright © 2025 <a href="http://diveratech.site/">Seserahan byPings</a>, All rights reserved.</span>
        </div>
    </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/users/js/libs.min.js')}}"></script>
    <script src="{{ asset('assets/users/js/main.js')}}"></script>

</div>
<script>
    window.addEventListener('DOMContentLoaded', function () {
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
@endphp
<script>
    const produkData = @json($produkData);
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

    function renderSlides(kategori) {
        const wrapper = document.getElementById('produkSlides');
        const swiper = document.querySelector('.post-slider .swiper-container')?.swiper;
        if (!swiper || !wrapper) return;

        // Hapus semua slide dari Swiper dan DOM
        swiper.removeAllSlides();

        // Filter data
        const filtered = kategori === 'all' ? produkData : produkData.filter(p => p.kategori === kategori);

        // Generate slide HTML
        const slidesHTML = filtered.map(createSlideHTML);

        // Tambahkan ke Swiper
        swiper.appendSlide(slidesHTML);
        swiper.update();
    }

    document.addEventListener('DOMContentLoaded', function () {
        const selectFilter = document.getElementById('filterKategori');
        renderSlides('all'); // default tampil semua

        selectFilter.addEventListener('change', function () {
            renderSlides(this.value);
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
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

        document.addEventListener('click', function (e) {
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


        modalSelect.addEventListener('change', function () {
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
        btnMinus.addEventListener('click', function () {
            let current = parseInt(qtyInput.value) || 1;
            if (current > 1) {
                qtyInput.value = current - 1;
            }
            updateTotalHarga();
            
        });
        
        btnPlus.addEventListener('click', function () {
            let current = parseInt(qtyInput.value) || 1;
            qtyInput.value = current + 1;
            updateTotalHarga();
        });
        document.getElementById('btnTambahKeranjang').addEventListener('click', function () {
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

</body>
</html>


