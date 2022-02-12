<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Language" content="id">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>NU CARE-LAZISNU</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="shortcut icon" type="image/x-icon" href="">
  <!-- Twitter -->
  <meta name="twitter:site" content="">
  <meta name="twitter:creator" content="">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="">
  <!-- Facebook & Whatsapp -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content=""/>
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />
  <meta property="og:image:alt" content="" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fancybox.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">

  @yield('css')
</head>
<body>
  <!-- Contents -->
  <main id="main-app">
    <div class="main-wrapper">
      <!-- Main Header -->
      @include('layouts.header')
      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <a href="#" class="wa-sosmed">
        <img height="64" width="64" src="{{ asset('img/wa-contact.svg') }}" alt="">
      </a>
      <!-- Main Footer -->
      @include('layouts.footer')
    </div>
  </main>

  <!-- Icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/fancybox.js') }}"></script>
  <script src="{{ asset('js/slick.min.js') }}"></script>
  @yield('scripts')
</body>
</html>
