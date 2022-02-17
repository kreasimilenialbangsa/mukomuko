@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/gallery.css') }}">
@endsection

@section('content')
  <div class="gallery-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span class="current">Galeri</span>
      </div>
      <div class="row">
        <section class="col-12 sec-gallery">
          <h4 class="text-center">Galeri</h4>
          <div class="row mt-4">
            <a class="wblock p-3 col-md-4 col-sm-6 col-12" data-fancybox="video-gallery" data-src="https://www.youtube.com/watch?v=PMUt0lShZfs">
              <img class="slider-img" src="https://i3.ytimg.com/vi/PMUt0lShZfs/maxresdefault.jpg">
              <img class="icon-play" src="{{ asset('img/play.svg') }}" height="30" width="30" alt="" class="icon-play">
              <div class="slider-detail">
                <p>qweqwe</p>
              </div>
            </a>
            <a class="wblock p-3 col-md-4 col-sm-6 col-12" data-fancybox="video-gallery" data-src="https://www.youtube.com/watch?v=PMUt0lShZfs">
              <img class="slider-img" src="https://i3.ytimg.com/vi/PMUt0lShZfs/maxresdefault.jpg">
              <img class="icon-play" src="{{ asset('img/play.svg') }}" height="30" width="30" alt="" class="icon-play">
              <div class="slider-detail">
                <p>qweqwe</p>
              </div>
            </a>
          </div>
          <div class="d-flex mt-4 justify-content-center">
            <ul class="pagination mb-0">
              <li class="page-item"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection