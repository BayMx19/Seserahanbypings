<!doctype html>

<html
  lang="en"
  class="layout-wide customizer-hide"
  data-assets-path="{{ asset('assets/admin/assets/')}}"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Seserahan byPings - Toko Seserahan Elegan & Eksklusif</title>
    <meta name="description" content="Seserahan byPings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.">
    <meta name="keywords" content="seserahan, Seserahan byPings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">
    <meta property="og:title" content="Seserahan byPings - Toko Seserahan Eksklusif">
    <meta property="og:description" content="Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!">
    <meta property="og:image" content="{{ asset('/assets/logo/logo.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/fonts/iconify-icons.css')}}" />
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/pages/page-auth.css')}}" />

    <script src="{{ asset('assets/admin/assets/vendor/js/helpers.js')}}"></script>
    <link href="{{ asset('/assets/logo/logo.png')}}" rel="shortcut icon" type="image/x-icon" /><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="{{ asset('assets/admin/assets/js/config.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <style>
      .text-blue {
        color: #696cff !important;
      }
    </style>
  </head>
  <body>
     <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link" onclick="location.reload(); return false;">
              <img src="{{ asset('assets/logo/logo.png') }}" style="width: 50px"/>
              <span class="app-brand-text demo menu-text fw-bold ms-2 text-blue">Seserahan byPings</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
            </a>
          </div>

          <div class="menu-divider mt-0"></div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item @if (request()->is('admin/dashboard')) active @endif">
              <a href="{{'/admin/dashboard'}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Master</span>
            </li>
            <li class="menu-item @if (request()->is('admin/users')) active @endif">
              <a href="{{'/admin/users'}}" class="menu-link">
                <i class="menu-icon  bx bx-group"></i>
                <div class="text-truncate" data-i18n="Dashboards">Master Users</div>
                
              </a>
            </li>
            <li class="menu-item @if (request()->is('admin/produk')) active @endif">
              <a href="{{'/admin/produk'}}" class="menu-link">
                <i class="menu-icon bx bx-box"></i>
                <div class="text-truncate" data-i18n="Dashboards">Master Produk</div>
                
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Transaksi</span>
            </li>
            <li class="menu-item @if (request()->is('admin/transaksi')) active @endif">
              <a href="{{'/admin/transaksi'}}" class="menu-link">
                <i class="menu-icon  bx bx-wallet"></i>
                <div class="text-truncate" data-i18n="Dashboards">Data Transaksi</div>
                
              </a>
            </li>
            <li class="menu-item @if (request()->is('admin/review')) active @endif">
              <a href="{{'/admin/review'}}" class="menu-link">
                <i class="menu-icon  bx bx-message"></i>
                <div class="text-truncate" data-i18n="Dashboards">Data Review</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Akun</span>
            </li>
            <li class="menu-item @if (request()->is('admin/profile')) active @endif">
              <a href="{{'/admin/profile'}}" class="menu-link">
                <i class="menu-icon  bx bx-user"></i>
                <div class="text-truncate" data-i18n="Dashboards">Profile</div>
              </a>
            </li>
            
            
          </ul>
        </aside>
         <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base bx bx-menu icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
              <!-- Search -->
              
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      @if (Auth::check())
                      <img
                              src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('assets/default_avatars.jpg') }}"
                              alt="Foto Profil"
                              class="w-px-40 h-auto rounded-circle"
                          />       
                      @endif             
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              @if (Auth::check())
                              <img
                                      src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('assets/default_avatars.jpg') }}"
                                      alt="Foto Profil"
                                      class="w-px-40 h-auto rounded-circle"
                                  />       
                              @endif   
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">{{Auth::user()->name}}</h6>
                            <small class="text-body-secondary">{{Auth::user()->role}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                   <li>
                      <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" class="dropdown-item d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-base bx bx-power-off icon-md me-3"></i>
                            <span>Log Out</span>
                        </a>
                    </form>
                  </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
            </div>
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    Copyright ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://diveratech.site" target="_blank" class="footer-link">Seserahan byPings</a>
                  </div>
                  
                </div>
              </div>
            </footer>
          </div>
         </div>
      </div>
     </div>

    <script src="{{ asset('assets/admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/js/dashboards-analytics.js') }}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/js/menu.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/js/main.js')}}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
     @yield('scripts')
  </body>