@extends('layouts.app')

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