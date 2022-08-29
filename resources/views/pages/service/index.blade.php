@extends('layouts.app')

@section('title')
  {{ $service->title }}
@endsection

@section('meta')
  <meta name="title" content="{{ $service->title }} - NU CARE">
  <meta name="description" content="{{ str_replace('<p>', '', $service->description) }}">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="{{ $service->title }} - NU CARE">
  <meta property="og:description" content="{{ str_replace('<p>', '', $service->description) }}">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="{{ $service->title }} - NU CARE">
  <meta property="twitter:description" content="{{ str_replace('<p>', '', $service->description) }}">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
@endsection

@section('content')
  <div class="rekening-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Layanan</span> / <span class="current">{{ $service->title }}</span>
      </div>
      <div class="row">
        <section class="col-12">
          <div class="wrapper-boxtext">
            <h1 class="box-title">{{ $service->title }}</h1>
            <div class="box-detail">
              {!! $service->description !!}
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