@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/news.css') }}">
@endsection

@section('content')
  <div class="news-page">
    <section class="slider-donate">
      @foreach($highlight as $key => $row)
        <div>
          <img class="slider-img" src="{{ asset('storage/' . $row->images[0]->file) }}" alt="{{ $row->title }}">
          <div class="slider-detail">
            <a class="btn btn-green mb-3" href="">{{ $row->category->name }}</a>
            <h3 class="slide-title">{{ $row->title }}</h3>
            <div class="slide-text">
              @if(strlen($row->content) > 100)
                {!! substr($row->content, 0, 100) . '...' !!}
              @else
                {!! $row->content !!}
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </section>
    <div class="container">
      <div class="row">
        <section class="col-lg-9 col-md-10 mx-auto my-4 sec-filter">
          <div class="d-flex">
            <div class="box-search">
              <div class="dropdown dropdown-cat">
                <button class="btn dropdown-toggle" type="button" id="dropdowncat" data-toggle="dropdown" aria-expanded="false">
                  Semua Kategori Berita
                </button>
                <div class="dropdown-menu w-100" aria-labelledby="dropdowncat">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <div class="wrap-search w-100">
                <input type="search" class="input-search w-100" name="search" placeholder="Cari Berita">
              </div>
            </div>
            <button class="btn btn-search btn-green">
              <ion-icon name="search-outline"></ion-icon>
            </button>
          </div>
        </section>
        <section class="col-12 pt-4 sec-listnews">
          <h4 class="text-center">Berita Terkini</h4>
          <div class="row mt-4">
            @forelse($news as $key => $row)
              <a href="{{ route('news.detail', $row->slug) }}" class="col-lg-3 col-md-4 col-6 p-3 wblock">
                <div class="card-thumbnail">
                  <div class="thumb-pict">
                    <img class="w-100" src="{{ asset('storage/' . $row->images[0]->file) }}" alt="{{ $row->title }}">
                    <span class="tag-cat">{{ $row->category->name }}</span>
                  </div>
                  <div class="card-detail">
                    <h6>{{ $row->title }}</h6>
                    <div class="d-flex author">
                      <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                      <span class="text-xs">{{ $row->user->name }}</span>
                    </div>
                    <div class="d-flex calendar mt-2">
                      <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                      <span class="text-xs">{{ date('d/m/Y', strtotime($row->created_at)) }}</span>
                    </div>
                  </div>
                </div>
              </a>
            @empty
            Data not found!
            @endforelse
          </div>
          <div class="d-flex mt-3 justify-content-center">
            {{ $news->links('vendor.pagination.bootstrap-4') }}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    $('.slider-donate').slick({
      dots: true,
      arrows: false
    });
  </script>
@endsection