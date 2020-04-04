<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  @yield('title')

  <!-- Styles -->
  <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
  <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

      <div class="navbar-left">
        <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('welcome') }}">
          <h5 class="text-white">{{ config('app.name', 'Laravel') }}</h5>
        </a>
      </div>

      @if(!auth()->user())
      <a class="btn btn-xs btn-round btn-primary" href="{{ route('login') }}">Login</a>
      @endif
    </div>
  </nav><!-- /.navbar -->

  @yield('header')


  @yield('content')

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row gap-y align-items-center">

        <div class="col-3 col-lg-3">
          <a href="{{ route('welcome') }}">
            <h5>{{ config('app.name', 'Laravel') }}</h5>
          </a>
        </div>

        <div class="col-3 col-lg-3">
          <h6>Address: {{ $settings->address}}</h6>

        </div>

        <div class="col-3 col-lg-3">
          <h6>Tel: {{ $settings->contact_number }}</h6>
          <h6>Email: {{ $settings->contact_email }}</h6>
        </div>

        <div class="col-3 col-lg-3">
          <div class="addthis_inline_share_toolbox_nvl3 text-right"></div>
        </div>


      </div>
    </div>
  </footer><!-- /.footer -->


  <!-- Scripts -->
  <script src="{{ asset('js/page.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d7aa4b8a9584fe9"></script>

</body>

</html>