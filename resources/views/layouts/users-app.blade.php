<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- partial:parts/_head.html -->
<meta charset="utf-8">
<title>@yield('title') - Toko Seserahan Elegan & Eksklusif</title>
<meta name="description" content="Seserahan by_pings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.">
<meta name="keywords" content="seserahan, Seserahan by_pings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">
<meta property="og:title" content="Seserahan by_pings - Toko Seserahan Eksklusif">
<meta property="og:description" content="Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!">
<meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=0">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('assets/users/css/libs.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/users/css/main.css')}}"/>
<link href="{{ asset('assets/users/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- partial -->
<style>
    .dropdown-user {
        position: relative;
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
                                <source media="(max-width: 767px)" srcset="images/logo-mob.png">
                                <source srcset="images/logo.png">
                                <img class="site-logo__img" src="images/logo.png" alt="logo"/>
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
                                            <li class="nav__item"><a href="#advantage" class="nav__link">Home</a></li>
                                            <li class="nav__item"><a href="#experiences" class="nav__link">Produk</a></li>
                                            <li class="nav__item"><a href="#delivery" class="nav__link">Tentang</a></li>
                                            <li class="nav__item"><a href="#tastes" class="nav__link">Kontak</a></li>
                                            
                                        </ul><!-- //nav__list -->
                                    </nav><!-- //nav -->
                                </div>
                                <div class="dropdown-user">
                                    <a href="javascript:void(0);" onclick="toggleDropdown()" style="color: #7A5AF8; font-weight: 600;">
                                        Selamat Datang, {{ Auth::user()->name }}!
                                    </a>

                                    <div id="userDropdown" class="dropdown-menu-user">
                                        <!-- Link ke profile -->
                                        <a href="#">
                                            <span class="dot"></span>
                                            <div style="margin-left: 5px;">
                                                <strong>Profile Saya</strong><br>
                                            </div>
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <!-- Logout -->
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <i class="bx bx-power-off me-2"></i> Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- //container -->
            </header><!-- //site-header -->

            <!-- partial -->
            <main id="main" class="main">
                @yield('content')
            </main><!-- //middle -->
    <!-- partial:parts/_footer.html -->
    <footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__container">
                <div class="row align-center">
                    <div class="col col_6 col_desktop-12">
                        <div class="row">
                            <div class="col col_12 col_desktop-3 col_mob-2 col_mob-p-12"></div>
                            <div class="col col_12 col_desktop-6 col_mob-8 col_mob-p-12">
                                <div class="footer-logo text-desktop-center">
                                    <a href="index.html" class="site-logo site-logo__link">
                                        <picture>
                                            <source media="(max-width: 767px)" srcset="images/logo.png">
                                            <source srcset="images/logo.png">
                                            <img class="site-logo__img" src="images/logo.png" alt="logo"/>
                                        </picture>
                                    </a>
                                    <div class="wysiwyg">
                                        <p>Pellentesque tempor felis interdum ultrices tincidunt enim integer diam nisi viverra </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col_12 col_desktop-3 col_mob-2 col_mob-p-12"></div>
                        </div>
                    </div>

                    
                    <div class="col col_6 col_desktop-6 col_mob-12">
                        <ul class="contact-list icon-list">
                            <li class="contact-item icon-text icon-position-right address">
                                City. Street Name, 88
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <g opacity="0.8"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 19.5C16.1421 19.5 19.5 16.1421 19.5 12C19.5 7.85786 16.1421 4.5 12 4.5C7.85786 4.5 4.5 7.85786 4.5 12C4.5 16.1421 7.85786 19.5 12 19.5ZM12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"/> <path d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0.75C12.4142 0.75 12.75 1.08579 12.75 1.5V11.25H22.5C22.9142 11.25 23.25 11.5858 23.25 12C23.25 12.4142 22.9142 12.75 22.5 12.75H12.75V22.5C12.75 22.9142 12.4142 23.25 12 23.25C11.5858 23.25 11.25 22.9142 11.25 22.5V12.75H1.5C1.08579 12.75 0.75 12.4142 0.75 12C0.75 11.5858 1.08579 11.25 1.5 11.25H11.25V1.5C11.25 1.08579 11.5858 0.75 12 0.75Z"/> </g> </svg>
                            </li>
                            <li class="contact-item icon-text icon-position-right">
                                <a href="tel:9999912345678" class="contact-link">+999 99 1234 5678</a>
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <g opacity="0.8"> <path d="M3 8.25C3 6.17893 4.61177 4.5 6.6 4.5H17.4C19.3882 4.5 21 6.17893 21 8.25V13.875C21 15.9461 19.3882 17.625 17.4 17.625H8.4L3 19.5V8.25Z"/> <path d="M6 9.75C6 9.33579 6.33579 9 6.75 9H17.25C17.6642 9 18 9.33579 18 9.75C18 10.1642 17.6642 10.5 17.25 10.5H6.75C6.33579 10.5 6 10.1642 6 9.75Z" fill="white"/> <path d="M6 12.75C6 12.3358 6.33579 12 6.75 12H14.25C14.6642 12 15 12.3358 15 12.75C15 13.1642 14.6642 13.5 14.25 13.5H6.75C6.33579 13.5 6 13.1642 6 12.75Z" fill="white"/> </g> </svg>
                            </li>
                            <li class="contact-item icon-text icon-position-right">
                                <a href="mailto:#" class="contact-link">info@example.com</a>
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <g opacity="0.8"> <path d="M3 6.42857C3 5.36345 3.80589 4.5 4.8 4.5H19.2C20.1941 4.5 21 5.36345 21 6.42857V16.0714C21 17.1365 20.1941 18 19.2 18H4.8C3.80589 18 3 17.1365 3 16.0714V6.42857Z" /> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.41205 7.9309C5.70746 7.48634 6.30614 7.36621 6.74925 7.66258L12 11.1746L17.2507 7.66258C17.6939 7.36621 18.2925 7.48634 18.5879 7.9309C18.8834 8.37547 18.7636 8.97612 18.3205 9.2725L12 13.5L5.67949 9.2725C5.23638 8.97612 5.11664 8.37547 5.41205 7.9309Z" fill="white"/> </g> </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <span class="copyright text-center">Copyright ©2025 <a href="http://diveratech.site/">Seserahan by_pings</a>, All rights reserved.</span>
        </div>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script><!-- jQuery -->
    <script src="{{ asset('assets/users/js/libs.min.js')}}"></script><!-- скрипты библиотек -->
    <script src="{{ asset('assets/users/js/main.js')}}"></script><!-- кастомные скрипты -->
        <!-- partial -->
        <!-- partial:parts/_popups.html -->
        


    


    <!-- partial -->
</div><!-- //wrapper -->
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
</body>
</html>

