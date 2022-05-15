@extends('layouts.app')

@section('title')
  {{ $news->title }}
@endsection

@section('meta')
  <meta name="title" content="{{ $news->title }} - NU CARE">
  <meta name="description" content="{{ str_replace('<p>', '', $news->content) }}">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="{{ $news->title }} - NU CARE">
  <meta property="og:description" content="{{ str_replace('<p>', '', $news->content) }}">
  <meta property="og:image" content="{{ asset('storage/' . $news->images[0]->file) }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="{{ $news->title }} - NU CARE">
  <meta property="twitter:description" content="{{ str_replace('<p>', '', $news->content) }}">
  <meta property="twitter:image" content="{{ asset('storage/' . $news->images[0]->file) }}">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/news-detail.css') }}">
@endsection

@section('content')
  <div class="newsdetail-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Berita</span> / <span class="current">{{ $news->title }}</span>
      </div>
      <div class="row">
        <section class="col-12 sec-headline">
          <div class="slider-headline">
            @foreach($news->images as $image)
              <div>
                <img class="slider-img" src="{{ asset('storage/' . $image->file) }}" alt="{{ $news->title }}">
              </div>
            @endforeach
          </div>
        </section>
        <section class="col-12 sec-detail">
          <div class="row">
            <div class="col-md-2 order-md-1 order-2 mt-md-0 mt-4">
              <div class="wrap-share d-md-block d-flex">
                <h6 class="font-medium mb-3">Bagikan</h6>
                <div onClick="fbShare('{{ Request::url() }}', '{{ $news->title }}', '{{ $news->images[0]->file }}', 420, 250)" class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-facebook"></ion-icon>
                </div>
                <div onClick="twShare('{{ Request::url() }}', '{{ $news->title }}', 420, 250)" class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-twitter"></ion-icon>
                </div>
                <div onClick="waShare('{{ Request::url() }}', '{{ $news->title }}', 420, 250)" class="clr-grey h4 ml-md-0 ml-3">
                  <ion-icon class="ic-ion ic-sosmed" name="logo-whatsapp"></ion-icon>
                </div>
              </div>
            </div>
            <div class="col-md-10 order-md-2 order-1">
              <div class="title-news">
                <h3 class="font-semibold">{{ $news->title }}</h3>
                <span class="clr-grey">By <b>{{ $news->user->name }}</b> | {{ date('d/m/Y - H:i', strtotime($news->created_at)) }} WIB</span>
              </div>
              <div class="wrapper-detail mt-4">
                {!! $news->content !!}
              </div>
              <div class="d-center wrap-category">
                <span>Kategori:</span>
                <div class="d-center wrap-tags">
                  <span class="tag-cat ml-2">{{ $news->category->name }}</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- <section class="col-12 sec-navigation">
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
        </section> -->
        <section class="col-12 mt-5 sec-listnews">
          <h4 class="text-center">Berita Terkini</h4>
          <div class="row mt-4">
            @foreach($latestNews as $last)
              <a href="{{ route('news.detail', $last->slug) }}" class="col-lg-3 col-md-4 col-sm-6 col-12 p-3 wblock">
                <div class="card-thumbnail">
                  <div class="thumb-pict">
                    <img class="w-100" src="{{ asset('storage/' . $last->images[0]->file) }}" alt="{{ $last->title }}">
                    <span class="tag-cat tag-abs">{{ $last->category->name }}</span>
                  </div>
                  <div class="card-detail">
                    <h6 class="card-title">
                      @if(strlen($last->title) > 100)
                        {!! substr($last->title, 0, 100) . '...' !!}
                      @else
                        {!! $last->title !!}
                      @endif
                    </h6>
                    <div class="d-flex author">
                      <img class="mr-2" src="{{ asset('img/user.svg') }}" alt="">
                      <span class="text-xs">{{ $last->user->name }}</span>
                    </div>
                    <div class="d-flex calendar mt-2">
                      <img class="mr-2" src="{{ asset('img/calendar.svg') }}" alt="">
                      <span class="text-xs">{{ date('d/m/Y', strtotime($last->created_at)) }}</span>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
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

    function fbShare(url, title, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
    }

    function waShare(url, title, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('whatsapp://send?text="'+ title + ' - ' + url +'" data-action="share/whatsapp/share"', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
    }

    function twShare(url, title, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('https://twitter.com/intent/tweet?text='+ title + ' - ' + url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
    }
  </script>
@endsection