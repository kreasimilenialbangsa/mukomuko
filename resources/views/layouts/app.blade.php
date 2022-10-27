<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Language" content="id">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') - NU CARE</title>
  <meta name="author" content="NU CARE-LAZISNU">
  <meta name="keywords" content="NU Care LAZISNU">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

  @yield('meta')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fancybox.css') }}">
  <link rel="stylesheet" href="{{ asset('css/panzoom.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components/modal-auth.css') }}">

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
      <a href="https://wa.me/6281271116449?text=Halo%20LazizNU%20Mukomuko,%20saya%20ingin%20berdonasi" target="_blank"
        class="wa-sosmed">
        <img height="55" width="55" src="{{ asset('img/wa-contact.svg') }}" alt="">
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
  <script src="{{ asset('vendor/jquery-maskmoney/jquery-maskmoney.js') }}"></script>

  <script src="https://www.googletagmanager.com/gtag/js?id=G-E5104KMR54"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-E5104KMR54');
  </script>

  <script>
    Fancybox.bind('[data-fancybox="video-gallery"]', {
      Toolbar: {
        display: [
          { id: "prev", position: "center" },
          { id: "counter", position: "center" },
          { id: "next", position: "center" },
          "zoom",
          "slideshow",
          "fullscreen",
          "download",
          "thumbs",
          "close",
        ],
      },
    });
    $('.slider-header').slick({
      dots: true,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000
    });

    $(".currency").maskMoney({ 
      autoLoad:true, thousands:'.', decimal:',', affixesStay: false, precision: 0
    }).maskMoney('mask');
  </script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    @if(Session::has('success'))
      $(document).ready(function() {
        Swal.fire({
            title: 'Berhasil',
            icon: 'success',
            confirmButtonColor: '#45BF7C',
            text: "{{ Session::get('success') }}"
        });
      });
    @endif

    @if(Session::has('error'))
      $(document).ready(function() {
        Swal.fire({
            title: 'Gagal',
            icon: 'error',
            confirmButtonColor: '#45BF7C',
            text: "{{ Session::get('error') }}"
        });
      });
    @endif
  </script>

  <script>
    $(document).ready(function() {
      $('.daftar').on('click', function(e) {
        e.preventDefault();

        if ($('.form-daftar')[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        } else {
            $.ajax({
                url: "{{ route('register-user') }}",
                type: "post",
                data: $('.form-daftar').serialize(),
                success: function(res){
                  $('#editModal').modal('toggle').then(
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.message,
                        width: 300,
                        confirmButtonColor: '#45BF7C',
                    }).then(function() {
                        location.reload();
                    }));
                },
                error: function(jqXHR, exception) {
                    var err = eval("(" + jqXHR.responseText + ")");
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.message,
                        width: 350,
                        confirmButtonColor: '#45BF7C'
                    })
                }
            });
        }

        $('.form-daftar').addClass('was-validated');
      })
    });
  </script>
  @yield('scripts')
</body>

</html>