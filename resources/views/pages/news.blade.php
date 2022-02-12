@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/news.css') }}">
@endsection

@section('content')
  <div class="news-page">
    <section class="slider-donate">
      <div>
        <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
        <div class="slider-detail">
          <h3 class="slide-title">Berdonasi bersama Lazisnu Trenggalek</h3>
          <div class="slide-text">
            <p>“Allah senantiasa menolong seorang hamba selama hamba itu menolong saudaranya.” <br><br> - HR. Muslim</p>
          </div>
          <a class="btn btn-green" href="">Donasi Sekarang</a>
        </div>
      </div>
      <div>
        <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
        <div class="slider-detail">
          <h3 class="slide-title">Berdonasi bersama Lazisnu Trenggalek</h3>
          <div class="slide-text">
            <p>“Allah senantiasa menolong seorang hamba selama hamba itu menolong saudaranya.” <br><br> - HR. Muslim</p>
          </div>
          <a class="btn btn-green" href="">Donasi Sekarang</a>
        </div>
      </div>
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
                <div class="dropdown-menu" aria-labelledby="dropdowncat">
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
      </div>
      <div class="row">
        <section class="col-12 pt-4 sec-listnews">
          <h4 class="text-center">Berita Terkini</h4>
          <div class="row mt-4">
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Sosial</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B...</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">Sudirjo Tirto</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">10/08/2021</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Sosial</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B...</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">Sudirjo Tirto</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">10/08/2021</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Sosial</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B...</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">Sudirjo Tirto</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">10/08/2021</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Sosial</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B...</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">Sudirjo Tirto</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">10/08/2021</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Sosial</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B...</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">Sudirjo Tirto</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">10/08/2021</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="d-flex mt-3 justify-content-center">
            <ul class="pagination">
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
  <script>
    $('.slider-donate').slick({
      dots: true,
      arrows: false
    });
  </script>
@endsection