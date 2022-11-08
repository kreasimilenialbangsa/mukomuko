@extends('layouts.app')

@section('title')
  {{ $program->title }}
@endsection

@section('meta')
  <meta name="title" content="{{ $program->title }} - NU CARE">
  <meta name="description" content="Ayo mulai berdonasi untuk membantu teman kita yang membutuhkan!">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="{{ $program->title }} - NU CARE">
  <meta property="og:description" content="Ayo mulai berdonasi untuk membantu teman kita yang membutuhkan!">
  <meta property="og:image" content="{{ asset('storage/' . $program->image) }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="{{ $program->title }} - NU CARE">
  <meta property="twitter:description" content="Ayo mulai berdonasi untuk membantu teman kita yang membutuhkan!">
  <meta property="twitter:image" content="{{ asset('storage/' . $program->image) }}">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/program-detail.css') }}">
@endsection

@section('content')
  <div class="programdetail-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Program</span> / <span class="current">{{ $program->title }}</span>
      </div>
      <div class="row">
        <section class="col-12 sec-detail">
          <div class="row">
            <div class="col-md-8">
              <div class="thumb-headline">
                <img class="w-100" src="{{ asset('storage/' . $program->image) }}" alt="">
              </div>
              <div class="wrapper-detail mt-4">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detailtab" role="tab" aria-controls="detailtab" aria-selected="true">
                      Detail
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="new-info" data-toggle="tab" href="#newinfotab" role="tab" aria-controls="newinfotab" aria-selected="false">
                      Kabar Terbaru
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="donatur-tab" data-toggle="tab" href="#donaturtab" role="tab" aria-controls="donaturtab" aria-selected="false">
                      Donatur <span class="clr-green">({{ $program->donate_count }})</span>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" id="doa-tab" data-toggle="tab" href="#doatab" role="tab" aria-controls="doatab" aria-selected="false">
                      Doa
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="detailtab" role="tabpanel" aria-labelledby="detail-tab">
                    <h4>{{ $program->title }}</h4>
                    <div class="mb-0">{!! $program->description !!}</div>
                  </div>
                  <div class="tab-pane fade" id="newinfotab" role="tabpanel" aria-labelledby="new-info">
                    @forelse($program->news as $key => $news)
                    <div class="history-info">
                      <div class="bullet">
                        <img width="12" height="12" src="{{ asset('img/bullet.svg') }}" alt="">
                      </div>
                      <div class="info-detail">
                        <span class="text-xs clr-grey">{{ date('d/m/Y H:i:s', strtotime($news->created_at)) }}</span>
                        <div class="mb-0 text-xs clr-grey">
                          {!! $news->description !!}
                        </div>
                        {{-- <h6 class="text-sm my-2">Program Dirilis</h6>
                        <p class="mb-0 text-xs clr-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet aliquam enim phasellus et posuere eget magna. Faucibus mi ut quam enim.</p>
                        <div class="image-info">
                          <img src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                        </div> --}}
                      </div>
                    </div>
                    @empty
                      <div class="empty-state">
                        <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                        <h4 class="mt-4 font-semibold">Data Tidak Ditemukan</h4>
                        <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
                      </div>
                    @endforelse
                  </div>
                  <div class="tab-pane fade" id="donaturtab" role="tabpanel" aria-labelledby="donatur-tab">
                    <div class="row px-2">
                      @forelse($donates as $donate)
                        <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
                          <div class="card-simple">
                            <h6 class="clr-green text-sm">{{ $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name }}</h6>
                            <p class="text-xs mb-2 font-medium">Berdonasi sebesar {{ "Rp " . number_format($donate->total_donate,0,",",".") }}</p>
                            <span class="text-xxs">{{ \Carbon\Carbon::parse($donate->date_donate)->diffForHumans() }}</span>
                          </div>
                        </a>
                      @empty
                        <div class="empty-state">
                          <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                          <h4 class="mt-4 font-semibold">Data Tidak Ditemukan</h4>
                          <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
                        </div>
                      @endforelse
                    </div>
                  </div>  
                  <div class="tab-pane fade" id="doatab" role="tabpanel" aria-labelledby="doa-tab">
                    <div class="row px-2">
                      @forelse ($doa as $data_doa)
                      <a class="col-lg-4 col-sm-6 col-12 p-2 wblock">
                        <div class="card-simple">
                          <h6 class="text-sm">{{ $data_doa->is_anonim == 1 ? 'Hamba Allah' : $data_doa->name }}</h6>
                          <div class="d-center text-xxs">
                            <span class="w-50">{{ \Carbon\Carbon::parse($donate->date_donate)->diffForHumans() }}</span>
                          </div>
                          <p class="text-xs clr-grey mb-0 mt-2 font-medium">{{ $data_doa->message }}</p>
                        </div>
                      </a>
                      @empty
                      <div class="empty-state">
                        <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                        <h4 class="mt-4 font-semibold">Data Tidak Ditemukan</h4>
                        <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
                      </div>
                      @endforelse
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="wrapper-donatur mt-md-0 mt-4">
                <div class="wrap-tags mb-2">
                  @if($program->is_urgent == 1)
                    <span class="tag-cat urgent">Darurat</span>
                  @endif
                  <span class="tag-cat">{{ $program->category->name }}</span>
                </div>
                <h5>{{ $program->title }}</h5>
                <div class="d-flex justify-content-between my-3">  
                  <div class="d-center">
                    <ion-icon class="mr-1 text-md" name="location-sharp"></ion-icon>
                    <span class="text-xs font-medium">{{ $program->location }}</span>
                  </div>
                  <div class="d-center">
                    <img class="mr-1" width="16" height="16" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs font-medium">{{ $program->user->name }}</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $program->donate_sum_total_donate/$program->target_dana*100 }}%" aria-valuenow="{{ $program->donate_sum_total_donate/$program->target_dana*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-center mt-2 justify-content-between">
                  <div class="mr-2 mb-3">
                    <h6 class="clr-green">{{ "Rp " . number_format($program->donate_sum_total_donate,0,",",".") }}</h6>
                    <span class="text-xs clr-grey font-semibold">Terkumpul dari {{ "Rp " . number_format($program->target_dana,0,",",".") }}</span>
                  </div>
                  <div class="text-right">
                    <span class="text-xs clr-grey">Sisa Hari</span>
                    <h6 class="text-sm">{{ $program->count_day }}</h6>
                  </div>
                </div>
                <div class="wrap-share pb-2">
                  <span class="text-xs clr-grey">Bagikan agar target lebih cepat terkumpul:</span>
                  <div class="d-flex mt-2">
                    <a href="#" class="clr-grey h5 mr-2" onClick="fbShare('{{ Request::url() }}', '{{ $program->title }}', '{{ $program->image }}', 420, 250)">
                      <ion-icon class="ic-sosmed" name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="clr-grey h5 mr-2" onClick="twShare('{{ Request::url() }}', '{{ $program->title }}', 420, 250)">
                      <ion-icon class="ic-sosmed" name="logo-twitter"></ion-icon>
                    </a>
                    <a href="#" class="clr-grey h5 mr-2" onClick="waShare('{{ Request::url() }}', '{{ $program->title }}', 420, 250)">
                      <ion-icon class="ic-sosmed" name="logo-whatsapp"></ion-icon>
                    </a>
                  </div>
                </div>
                @if($program->count_day > 0)
                  {!! Form::open(['route' => 'program.payment', 'class' => 'form-donatur mt-3']) !!}
                  <div class="form-group">
                    <label for="nominal">Masukan Nominal Donasi</label>
                    <input type="text" class="form-control currency" name="nominal">
                    <input type="hidden" class="form-control currency" name="program" value="{{ $program->id }}">
                  </div>
                  {{-- <div class="form-group mb-0 d-center justify-content-between">
                    <label class="mb-0" for="hide-name">Sembunyikan nama saya (Anonim)</label>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                  </div> --}}
                    <div class="form-group mb-0">
                      <button class="btn w-100 btn-green mt-3 py-2" type="submit">Lanjut Pembayaran</button>
                    </div>
                    {!! Form::close() !!}
                @else
                    <div class="py-3 px-1 text-center" style="background-color: #e9e9e9;">
                      <p class="h6">Penggalangan Dana Telah Berakhir</p>
                    </div>
                @endif
              </div>
            </div>
          </div>
        </section>
        <!-- <section class="col-12 mt-5 sec-navigation">
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
        <section class="col-12 mt-5 sec-regist">
          <div class="banner-regist">
            <h4 class="banner-title mr-lg-3 mb-0">Yuk! Daftar untuk Mulai Ber - Donasi Membantu Sesama!</h4>
            <a href="" class="btn btn-green btn-regist">Daftar Sekarang Gratis</a>
          </div>
        </section>
        <section class="col-12 mt-5 sec-programlist">
          <h4 class="text-center">Program Lainnya!</h4>
          <div class="row mt-4">
            @forelse($programs as $key => $program)
              <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-3">
                <div class="card-thumbnail">
                  <a class="wblock" href="{{ route('program.detail', $program->slug) }}">
                    <div class="thumb-pict">
                      <img class="w-100" src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}">
                    </div>
                    <div class="card-detail">
                      <div class="wrap-tags mb-2">
                        @if($program->is_urgent == 1)
                          <span class="tag-cat urgent">Darurat</span>
                        @endif
                        <span class="tag-cat">{{ $program->category->name }}</span>
                      </div>
                      <h6 class="card-title">
                        @if(strlen($program->title) > 100)
                          {!! substr($program->title, 0, 100) . '...' !!}
                        @else
                          {!! $program->title !!}
                        @endif
                      </h6>
                      <p class="text-xs mb-1 font-medium">{{ $program->location }}</p>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $program->donate_sum_total_donate/$program->target_dana*100 }}%" aria-valuenow="{{ $program->donate_sum_total_donate/$program->target_dana*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex mt-2 justify-content-between">
                        <div class="w-left mr-2">
                          <span class="text-xs clr-grey">Terkumpul</span>
                          <h6 class="text-sm"><h6 class="text-sm">{{ "Rp " . number_format($program->donate_sum_total_donate,0,",",".") }}</h6></h6>
                        </div>
                        <div class="w-right text-right">
                          <span class="text-xs clr-grey">Sisa Hari</span>
                          <h6 class="text-sm">{{ $program->count_day }}</h6>
                        </div>
                      </div>
                      @if($program->count_day > 0)
                        <a href="{{ route('program.detail', $program->slug) }}" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                      @else
                        <button class="mt-2 py-2 btn btn-secondary w-100" disabled>Ikut Donasi</button>
                      @endif
                    </div>
                  </a>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                <h4 class="mt-4 font-semibold">Data Tidak Ditemukan</h4>
                <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
              </div>
            @endforelse
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>

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