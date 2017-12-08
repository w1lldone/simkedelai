<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soyworld - Sistem Informasi Pengendalian Kedelai Lokal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Google fonts - Noto Sans -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700">
    <!-- theme stylesheet-->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet"> --}}
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#06ef63">
    <meta name="theme-color" content="#ffffff">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Font Icons CSS-->
    {{-- <link rel="stylesheet" href="{{ asset('icons-reference/styles.css') }}"> --}}
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Just an image -->
    <nav class="navbar navbar-toggleable-md navbar-inverse" style="background-color: #2f333e;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#simpel-nav" aria-controls="simpel-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="/img/logo/logo-only-outline.svg" height="45" alt="">
      </a>
      <div class="collapse navbar-collapse" id="simpel-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/login"><i class="fa fa-sign-in fa-fw"></i>Login</a>
          </li>
        </ul>
      </div>
    </nav>
    
    @yield('content')
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/tether.min.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.cookie.js') }}"> </script> --}}
    {{-- <script src="{{ asset('js/jquery.validate.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{-- <script src="{{ asset('js/front.js') }}"></script> --}}

    @yield('script')
  </body>
</html>