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
            @forelse($galleries as $gallery)
              @if(@$gallery->type == 'image')
                <a class="wblock p-3 col-md-4 col-sm-6 col-12" data-fancybox="video-gallery" data-src="{{ asset('storage' . $gallery->content) }}">
                  <img class="slider-img" src="{{ asset('storage' . $gallery->content) }}">
                  <div class="slider-detail">
                    <p>{{ $gallery->title }}</p>
                  </div>
                </a>
              @else
                <a class="wblock p-3 col-md-4 col-sm-6 col-12" data-fancybox="video-gallery" data-src="https://www.youtube.com/watch?v={{ $gallery->content }}">
                  <img class="slider-img" src="https://i3.ytimg.com/vi/{{ $gallery->content }}/maxresdefault.jpg">
                  <img class="icon-play" src="{{ asset('img/play.svg') }}" height="30" width="30" alt="" class="icon-play">
                  <div class="slider-detail">
                    <p>{{ $gallery->title }}</p>
                  </div>
                </a>
              @endif
            @empty
            <div class="empty-state">
              <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
              <h4 class="mt-4 font-semibold">Data Not Found</h4>
              <p class="font-medium">Sorry, the data you were looking for could not be found</p>
            </div>
            @endforelse
          </div>
          <div class="d-flex mt-4 justify-content-center">
            {{ $galleries->links('vendor.pagination.bootstrap-4') }}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection