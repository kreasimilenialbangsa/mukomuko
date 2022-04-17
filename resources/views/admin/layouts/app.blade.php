<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link href="{{ asset('vendor/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">

  <!-- select2 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">

  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('admin.layouts.header')
      </nav>
      <div class="main-sidebar">
        @include('admin.layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        @include('admin.layouts.footer')
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('web/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('vendor/dropify/dist/js/dropify.min.js') }}"></script>
  <script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js" integrity="sha512-3tlegnpoIDTv9JHc9yJO8wnkrIkq7WO7QJLi5YfaeTmZHvfrb1twMwqT4C0K8BLBbaiR6MOo77pLXO1/PztcLg=="></script>

  <!-- Template JS File -->
  <script src="{{ asset('web/js/scripts.js') }}"></script>
  <script src="{{ asset('web/js/custom.js') }}"></script>

  <!-- Select2 JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{ asset('vendor/jquery-maskmoney/jquery-maskmoney.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('.select2').select2({
          theme: 'bootstrap4'
      });

      $(".currency").maskMoney({ 
        autoLoad:true, thousands:'.', decimal:',', affixesStay: false, precision: 0
      }).maskMoney('mask');

      $('.dropify').dropify({
          messages: {
              default: 'Drag and drop file here or click',
              replace: 'Drag and drop file here or click to Replace',
              remove:  'Remove',
              error:   'Maaf, ukuran file terlalu besar'
          }
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      var editor_config = {
          path_absolute : "/",
          selector: 'textarea.my-editor',
          height : "400",
          plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
              var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
              var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
              var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                  cmsURL = cmsURL + "&type=Files";
              tinyMCE.activeEditor.windowManager.open({
                  file : cmsURL,
                  title : 'Filemanager',
                  width : x * 0.8,
                  height : y * 0.8,
                  resizable : "yes",
                  close_previous : "no"
              });
          }
      }
      tinymce.init(editor_config);
    });
  </script>

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

    $(document).on('click','.delete',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Menghapus Data',
            icon: 'warning',
            text: "Anda yakin untuk menghapus data ini?",
            showCancelButton: true,
            confirmButtonColor: '#FF0101',
            cancelButtonColor: '#B9B2B2',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).submit();
            }
        });
    });

    function toggle(el, url) {
      $(document).on('change', el, function(e) {
        e.preventDefault();
        let val = $(this).is(":checked") == true ? 1 : 0;
        let id = $(this).data('id');

        $.ajax({
            url: url,
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              "val": val,
              "id": id
            },
            success: function(res){
              if(res) {
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    confirmButtonColor: '#45BF7C',
                    text: res.message
                });
              }
            }
        });
      });
    }
  </script>

  <!-- Page Specific JS File -->
  @stack('script')
</body>
</html>
