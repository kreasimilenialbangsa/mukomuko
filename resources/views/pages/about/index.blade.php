@extends('layouts.app')

@section('title')
  {{ $about->title }}
@endsection

@section('meta')
  <meta name="title" content="{{ $about->title }} - NU CARE">
  <meta name="description" content="{{ str_replace('<p>', '', $about->description) }}">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="{{ $about->title }} - NU CARE">
  <meta property="og:description" content="{{ str_replace('<p>', '', $about->description) }}">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="{{ $about->title }} - NU CARE">
  <meta property="twitter:description" content="{{ str_replace('<p>', '', $about->description) }}">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
@endsection

@section('content')
  <div class="about-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Tentang</span> / <span class="current">{{ $about->title }}</span>
      </div>
      <div class="row">
        <section class="col-12">
          <div class="wrapper-boxtext">
            <h1 class="box-title">{{ $about->title }}</h1>
            <div class="box-detail">
              {!! $about->description !!}
            </div>
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