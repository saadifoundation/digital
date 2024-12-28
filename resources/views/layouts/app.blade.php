<!doctype html>
<html lang="fa">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicons/ssadifoundation-apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/ssadifoundation-apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/ssadifoundation-apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/ssadifoundation-apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/ssadifoundation-apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/ssadifoundation-apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/ssadifoundation-apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/ssadifoundation-apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/ssadifoundation-apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/favicons/ssadifoundation-android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/ssadifoundation-favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicons/ssadifoundation-favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/ssadifoundation-favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/ssadifoundation-ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Meta tags -->
    <!-- HTML Meta Tags -->
    <meta name="description" content="@yield('description')">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">

    <!-- Mu.chat -->
    <script type="module">
      import Chatbox from 'https://cdn.mu.chat/embeds/dist/chatbox/index.js?v=2';
        
      const widget = await Chatbox.initBubble({
      agentId: 'cm57rc7ud04wl18i9tq0633um',
          });
    </script>
  </head>
  <body>
    <div class="navbar navbar-expand-sm navbar-light bg-light justify-content-center">
      <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
          <img src="{{ asset('img/saadifoundation-logo-header.png') }}" alt="" class="img-responsive" width="300" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('index') }}"><span class="sr-only">(current)</span>
                {{ __('فهرست امکانات مجازی') }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="book-header pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 mt-2">
                        @yield('title')
                    </h1>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
  
    <footer class="container-fluid pt-4 my-md-4 border-top text-center border-level-a">
      <div dir="ltr" class="row">
          <div class="col-12 col-md">
              <a href="https://saadifoundation.ir" target="_blank">
                <img class="mb-2" src="{{ asset('/img/saadifoundation-logo.png') }}" alt="" width="24" height="24">
              </a>
              <small class="d-block mb-3 text-muted" style="font-family: Roboto;">&copy; {{ \Carbon\Carbon::now()->year }} Saadi Foundation</small>
          </div>
      </div>
      <div class="row">
        <div class="col-md col-12">
          <small class="d-block mb-3 text-muted">
            {{ __('لطفا اگر مشکلی در این صفحه پیدا کردید، به ما اطلاع دهید') }}: 
              <a href="{{ config('app.github_link') }}/issues/new?title={{ __('گزارش مشکل') }}:+@yield('title')&body=%0A%0A%0A---%0A{{ __('گزارش مشکل در صفحۀ') }}+ [@yield('title')]({{Request::url()}})" target="_blank">
                {{ __('گزارش مشکل') }}
              </a>
          </small>
        </div>
      </div>
    </footer>
</body>
</html>
