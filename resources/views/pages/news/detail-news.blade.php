@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/news-detail.css') }}">
@endsection

@section('content')
  <div class="newsdetail-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Berita</span> / <span class="current">lorem ipsum</span>
      </div>
      <div class="row">
        <section class="col-12 sec-headline">
          <div class="slider-headline">
            <div>
              <img class="slider-img" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
            </div>
            <div>
              <img class="slider-img" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
            </div>
            <div>
              <img class="slider-img" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
            </div>
          </div>
        </section>
        <section class="col-12 my-3 sec-detail">
          <div class="row">
            <div class="col-md-2 order-md-1 order-2 mt-md-0 mt-4">
              <div class="wrap-share d-md-block d-flex">
                <h6 class="font-medium mb-3">Bagikan</h6>
                <div class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-facebook"></ion-icon>
                </div>
                <div class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-twitter"></ion-icon>
                </div>
                <div class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-whatsapp"></ion-icon>
                </div>
              </div>
            </div>
            <div class="col-md-10 order-md-2 order-1">
              <div class="title-news">
                <h3 class="font-semibold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet aliquam enim phasellus et posuere eget magna.</h3>
                <span class="clr-grey font-medium">By <b>Anonymous</b> | 0/08/2021 — 21.50 WIB</span>
              </div>
              <div class="wrapper-detail mt-4">
                <img src="{{ asset('img/bg-ziwaf.jpg') }}" class="w-100" alt="">
                <h5 class="my-4">Lorem ipsum</h5>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur animi quaerat nulla velit numquam architecto excepturi repellat, aut voluptas. Enim maxime aut corrupti optio magnam ipsa sapiente dolor fugiat impedit!
                </p>
                <div class="row">
                  <div class="col-6">
                    <img src="{{ asset('img/bg-ziwaf.jpg') }}" class="w-100" alt="">
                  </div>
                  <div class="col-6">
                    <img src="{{ asset('img/bg-ziwaf.jpg') }}" class="w-100" alt="">
                  </div>
                </div>
                <h5 class="my-4">Lorem ipsum</h5>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur animi quaerat nulla velit numquam architecto excepturi repellat, aut voluptas. Enim maxime aut corrupti optio magnam ipsa sapiente dolor fugiat impedit!
                </p>
              </div>
              <div class="d-flex wrap-category">
                <span>Kategori:</span>
                <div class="d-flex">
                  <span class="tag-cat">Social</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="col-12 sec-navigation">
          <div class="d-center justify-content-between">
            <a class="d-center font-medium clr-black">
              <img class="mr-2" src="{{ asset('img/arrdouble-left.svg') }}" alt="">
              Kembali
            </a>
            <a class="d-center font-medium clr-black">
              Selanjutnya
              <img class="ml-2" src="{{ asset('img/arrdouble-right.svg') }}" alt="">
            </a>
          </div>
        </section>
        <section class="col-12 pt-4 sec-listnews">
          <h4 class="text-center">Berita Terkini</h4>
          <div class="row mt-4">
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">saipul</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">23 december</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">saipul</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">23 december</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">saipul</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">23 december</span>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="col-lg-3 col-md-4 col-6 p-3 wblock">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <div class="d-flex author">
                    <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs">saipul</span>
                  </div>
                  <div class="d-flex calendar mt-2">
                    <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                    <span class="text-xs">23 december</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    $('.slider-headline').slick({
      dots: true,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 5000
    });
  </script>
@endsection