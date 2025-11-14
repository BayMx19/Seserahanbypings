  <header id="header" class="header">
      <div class="container">
          <!-- logo -->
          <div class="site-logo">
              <a href="{{ url('/') }}" class="site-logo__link">
                  <picture>
                      <source media="(max-width: 767px)" srcset="{{ asset('assets/logo/logo.png')}}">
                      <img class="site-logo__img" src="{{ asset('/assets/logo/logo.png')}}" alt="logo"
                          style="width: 50px!important;" />
                      <source srcset="{{ asset('assets/logo/logo.png')}}" style="width: 50px !important;">
                  </picture>
              </a>
          </div>
          <div class="header-mobile">

              <div class="header-nav">
                  <div class="nav-toggle"><span class="nav-toggle__link"></span><span
                          class="nav-toggle__link"></span><span class="nav-toggle__link"></span></div>
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
                                  <li class="nav__item">
                                      <a href="{{ route('welcome.gallery') }}" class="nav__link">Gallery</a>
                                  </li>
                                  <li class="nav__item">
                                      <a href="{{ route('welcome.artikel') }}" class="nav__link">Artikel</a>
                                  </li>

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
  </header>
