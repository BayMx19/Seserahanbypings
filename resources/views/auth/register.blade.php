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

    <title>Register | Seserahan byPings - Toko Seserahan Elegan & Eksklusif</title>
    <meta name="description" content="Seserahan byPings menyediakan seserahan eksklusif untuk pernikahan, lamaran, dan tunangan. Desain elegan & harga bersahabat.">
    <meta name="keywords" content="seserahan, Seserahan byPings, seserahan banyuwangi, seserahan pernikahan, seserahan lamaran, toko seserahan, seserahan murah, seserahan eksklusif">
    <meta property="og:title" content="Seserahan byPings - Toko Seserahan Eksklusif">
    <meta property="og:description" content="Desain seserahan terbaik untuk momen spesial Anda. Cek katalog & pesan sekarang!">
    <meta property="og:image" content="{{ asset('assets/logo/logo.png')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/fonts/iconify-icons.css')}}" />
    <link href="{{ asset('/assets/logo/logo.png')}}" rel="shortcut icon" type="image/x-icon" /><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/admin/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('assets/admin/assets/js/config.js')}}"></script>
   
    <style>
    .text-blue {
      color: #696cff !important;
    }
    </style>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card px-sm-6 px-0">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-6">
                <a href="#" class="app-brand-link gap-2">
                  <img src="{{ asset('assets/logo/logo.png')}}" style="width: 50px"/>
                  <span class="app-brand-text demo text-heading fw-bold" style="font-size: 20px !important">Seserahan byPings</span>
                </a>
              </div>
             

              <form id="formAuthentication" class="mb-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-6">
                  <label for="name" class="form-label">Nama</label>
                  <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan Nama Anda"
                    autocomplete="name"
                    autofocus />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" autocomplete="email" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                  <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        value="{{ old('password') }}"
                        name="password"
                        autocomplete="new-password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-6">
                  <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password-confirm"
                        class="form-control"
                        name="password_confirmation"
                        autocomplete="new-password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        />
                      
                      <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="mb-2">
                <button type="submit" class="btn btn-primary d-grid w-100">Sign Up</button>
                </div>
              </form>
              
              <button type="button" class="btn btn-secondary d-grid w-100"  onclick="window.location.href='{{ url('/') }}'">Batal</button>
              <p class="text-center">
                <span>Sudah Punya Akun?</span>
                <a href="{{route('login')}}">
                  <span>Masuk Disini</span>
                </a>
              </p>

            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>




    <!-- Core JS -->
    <script src="{{ asset('assets/admin/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('assets/admin/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->

    <script src="{{ asset('assets/admin/assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>
