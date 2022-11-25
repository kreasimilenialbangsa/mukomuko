@extends('layouts.app')

@section('title')
  Lupa Password
@endsection

@section('meta')
  <meta name="title" content="Lupa Password - NU CARE">
  <meta name="description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="Lupa Password - NU CARE">
  <meta property="og:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="Lupa Password - NU CARE">
  <meta property="twitter:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
@endsection

@section('content')
  <div class="about-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span class="current">Atur Ulang Password</span>
      </div>
      <div class="row justify-content-center align-items-center" style="height: 55vh">
        <section class="col-md-6">
            
            <div class="wrapper-boxtext">

            <h4 class="mb-3">Atur Ulang Password</h4>
            <h6 class="mb-3">{{ $user->email }}</h6>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('reset-password.update', Request::segment(2)) }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Ketik password baru Anda" required class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi password Anda" required class="form-control" name="password_confirmation">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn py-2 btn-green w-100">Kirim</button>
                  </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection