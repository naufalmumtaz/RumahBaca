<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('judul') - Rumah Baca</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
          <div class="container">
            <a class="navbar-brand" href="#">Oemah Bintang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.koleksi') }}">Koleksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.kegiatan') }}">Kegiatan</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Artikel</a>
                </li>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#">Kontak</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer
    class="text-center text-lg-start text-white bg-dark" style="margin-top: 7em"
    >
  <!-- Grid container -->
  <div class="container p-3 pb-0">
  <!-- Section: Links -->
  <section class="">
  <!--Grid row-->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">
        Rumah Baca
      </h6>
      <p>
        B4, Jl. Yudistira No.10, Sawah, Jati, Kec. Jaten, Kabupaten Karanganyar, Jawa Tengah 57791
      </p>
    </div>
    <!-- Grid column -->

    <hr class="w-100 clearfix d-md-none" />

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">
        Link Terkait
      </h6>
      {{-- <p>
        <a class="text-white">Your Account</a>
      </p>
      <p>
        <a class="text-white">Become an Affiliate</a>
      </p>
      <p>
        <a class="text-white">Shipping Rates</a>
      </p>
      <p>
        <a class="text-white">Help</a>
      </p> --}}
    </div>

    <!-- Grid column -->
    <hr class="w-100 clearfix d-md-none" />

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
      <p><i class="fas fa-envelope mr-3"></i> diyah83@gmail.com</p>
      <p><i class="fas fa-phone mr-3"></i>+62 0858-1138-4039</p>
    </div>
    <!-- Grid column -->
  </div>
  <!--Grid row-->
  </section>
  <!-- Section: Links -->

  <hr class="my-3">

  <!-- Section: Copyright -->
  <section class="p-2 pt-0" s>
  <div class="row d-flex align-items-center">
    <!-- Grid column -->
    <div class="col-md-7 col-lg-8 text-center text-md-start">
      <!-- Copyright -->
      <div class="p-3">
        © 2020 Copyright RumahBaca
      </div>
      <!-- Copyright -->
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
      <!-- Facebook -->
      <a
        class="btn btn-outline-light btn-floating m-1"
        class="text-white"
        role="button"
        ><i class="bi bi-facebook"></i></a>

      <!-- youtube -->
      <a
        class="btn btn-outline-light btn-floating m-1"
        class="text-white"
        role="button"
        ><i class="bi bi-youtube"></i></i
        ></a>

      <!-- Instagram -->
      <a
        class="btn btn-outline-light btn-floating m-1"
        class="text-white"
        role="button"
        ><i class="bi bi-instagram"></i></a>

      <!-- whatsapp -->
      <a
        class="btn btn-outline-light btn-floating m-1"
        class="text-white"
        role="button"
        ><i class="bi bi-whatsapp"></i></a>
    </div>
    <!-- Grid column -->
  </div>
  </section>
  <!-- Section: Copyright -->
  </div>
  <!-- Grid container -->
  </footer>
  <!-- Footer -->

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
