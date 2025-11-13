<!DOCTYPE html>
<html lang="id">
<head>
    <!-- partial:parts/_head.html -->
<meta charset="utf-8">
    <title>{{ $meta_title ?? trim($__env->yieldContent('title') . ' | Seserahan byPings - Toko Seserahan Elegan & Eksklusif') }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Seserahan byPings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.' }}">
    <meta name="keywords" content="seserahan, SeserahanbyPings, Seserahan byPings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">

    <meta property="og:title" content="{{ $meta_title ?? 'Seserahan byPings - Toko Seserahan Eksklusif' }}">
    <meta property="og:description" content="{{ $meta_description ?? 'Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!' }}">
    <meta property="og:image" content="{{ $meta_image ?? asset('/assets/logo/logo.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('assets/users/css/libs.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/users/css/main.css')}}"/>
<link href="{{ asset('/assets/logo/logo.png')}}" rel="shortcut icon" type="image/x-icon" /><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- partial -->
<style>
    .dropdown-user {
        position: relative;
        padding-top: 2px;
        display: inline-block;
    }


    .dropdown-menu-user {
        display: none;
        position: absolute;
        right: 0;
        top: 120%;
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        min-width: 180px;
        z-index: 1000;
        overflow: hidden;
        font-family: inherit;
    }

    .dropdown-menu-user.active {
        display: block;
    }

    .dropdown-menu-user a,
    .dropdown-menu-user button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        width: 100%;
        text-decoration: none;
        background: none;
        border: none;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .dropdown-menu-user a:hover,
    .dropdown-menu-user button:hover {
        background-color: #f6f6f6;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #eee;
        margin: 4px 0;
    }

    .user-name {
        font-weight: 600;
    }

    .user-role {
        font-size: 12px;
        color: #999;
    }

    .user-status {
        width: 10px;
        height: 10px;
        background-color: #28c76f;
        border-radius: 50%;
        display: inline-block;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .text-blue {
        color: #696cff !important
    }

    /* Tambahkan ini ke file CSS kamu atau dalam <style> di blade */
    .select-layanan {
    display: block;
    width: 100%;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da; /* Ini bikin garis seperti input biasa */
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select-layanan:focus {
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    .badge {
        font-size: 0.6rem;
        padding: 4px 6px;
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
                                            @php
                                                $isHome = request()->is('home') || request()->is('home/*');
                                            @endphp

                                            <li class="nav__item">
                                                <a href="{{ $isHome ? '#about-us' : url('/home#about-us') }}" class="nav__link">Tentang</a>
                                            </li>
                                            <li class="nav__item">
                                                <a href="{{ $isHome ? '#products' : url('/home#products') }}" class="nav__link">Produk</a>
                                            </li> 
                                            <li class="nav__item">
                                                <a href="{{ $isHome ? '#products' : url('/home#products') }}" class="nav__link">Gallery</a>
                                            </li>   
                                            <li class="nav__item">
                                                <a href="{{ $isHome ? '#artikel' : url('/home#products') }}" class="nav__link">Artikel</a>
                                            </li>                                          
                                        </ul><!-- //nav__list -->
                                        <div class="dropdown-user">
                                            <a href="javascript:void(0);" onclick="toggleDropdown()" style="color: #7A5AF8; font-weight: 600; font-size: 18px !important;">
                                                Selamat Datang, {{ Auth::user()->name }}!
                                            </a>
        
                                            <div id="userDropdown" class="dropdown-menu-user">
                                                <!-- Link ke profile -->
                                                <a href="{{('/profile')}}" class="d-flex align-items-center">
                                                    <span class="dot"></span>
                                                    <div style="margin-left: 5px;">
                                                        <i class="fas fa-user me-2"></i>
                                                        <strong>Profile Saya</strong><br>
                                                    </div>
                                                </a>
                                                <a href="{{ route('keranjang.index') }}" class="d-flex align-items-center position-relative">
                                                    <span class="dot"></span>
                                                    <div style="margin-left: 5px;">
                                                        <i class="fas fa-shopping-cart me-2 position-relative">
                                                           @if($keranjangCount > 0)
                                                                <span id="keranjangBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                    {{ $keranjangCount }}
                                                                </span>
                                                            @else
                                                                <span id="keranjangBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">
                                                                    0
                                                                </span>
                                                            @endif
                                                        </i>
                                                        <strong>Keranjang</strong><br>
                                                    </div>
                                                </a>
                                                <a href="{{('/riwayat-pesanan')}}" class="d-flex align-items-center">
                                                    <span class="dot"></span>
                                                    <div style="margin-left: 5px;">
                                                        <i class="fas fa-receipt me-2"></i>
                                                        <strong>Riwayat Transaksi</strong><br>
                                                    </div>
                                                </a>
        
                                                <div class="dropdown-divider"></div>
        
                                                <!-- Logout -->
                                                <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center px-3 py-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-logout p-2 d-flex align-items-center text-danger">
                                                        <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                                    </button>
                                                </form>
                                            </div>
        
                                        </div>
                                    </nav><!-- //nav -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </header>

            <main id="main" class="main">
                @yield('content')
            </main>
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
                                                    <p>Seserahan elegan, penuh makna, dan bisa custom. Temani momen spesialmu bersama <br><b class="text-blue text-bold">Seserahan byPings</b>.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script><!-- jQuery -->
    <script src="{{ asset('assets/users/js/libs.min.js')}}"></script><!-- скрипты библиотек -->
    <script src="{{ asset('assets/users/js/main.js')}}"></script><!-- кастомные скрипты -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('modals')
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;

        if (hash) {
            // Tunggu DOM siap, baru scroll ke elemen
            const el = document.querySelector(hash);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.wrapper').classList.add('wrapper_ready-load');
    });
    window.onload = () => {
    document.querySelector('.wrapper').classList.add('wrapper_ready-load');
    };
</script>
<script>
    function toggleDropdown() {
        document.getElementById("userDropdown").classList.toggle("active");
    }

    // Optional: close if click outside
    document.addEventListener('click', function (event) {
        var dropdown = document.getElementById("userDropdown");
        var trigger = event.target.closest('.dropdown-user');

        if (!trigger) {
            dropdown.classList.remove("active");
        }
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const harga = document.getElementById('hargaProduk');
    const select = document.getElementById('jenisHarga');

    select.addEventListener('change', function () {
      const value = parseInt(this.value);
      harga.textContent = `Rp ${value.toLocaleString('id-ID')}`;
    });

    document.getElementById('minQty').addEventListener('click', function () {
      const qtyInput = document.getElementById('qtyInput');
      let val = parseInt(qtyInput.value);
      if (val > 1) qtyInput.value = val - 1;
    });

    document.getElementById('plusQty').addEventListener('click', function () {
      const qtyInput = document.getElementById('qtyInput');
      qtyInput.value = parseInt(qtyInput.value) + 1;
    });
  });
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@stack('scripts')\
</body>
</html>

