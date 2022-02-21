@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/program-detail.css') }}">
@endsection

@section('content')
  <div class="programdetail-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Program</span> / <span class="current">Program Donasi A</span>
      </div>
      <div class="row">
        <section class="col-12 sec-detail pb-4">
          <div class="row">
            <div class="col-md-8">
              <div class="thumb-headline">
                <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                <span class="tag-cat">Social</span>
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
                      Donatur <span class="clr-green">(16)</span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="detailtab" role="tabpanel" aria-labelledby="detail-tab">
                    <h4>Bantu Sedekah Makanan Gratis untuk Desa B</h4>
                    <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, doloremque recusandae? Officia provident nostrum sed soluta illum aliquam explicabo rerum, perspiciatis minus beatae est, nam maiores! Nobis vel delectus consectetur?</p>
                  </div>
                  <div class="tab-pane fade" id="newinfotab" role="tabpanel" aria-labelledby="new-info">
                    <div class="history-info">
                      <div class="bullet">
                        <img width="12" height="12" src="{{ asset('img/bullet.svg') }}" alt="">
                      </div>
                      <div class="info-detail">
                        <span class="text-xs clr-grey">10/08/2021</span>
                        <h6 class="text-sm my-2">Program Dirilis</h6>
                        <p class="mb-0 text-xs clr-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet aliquam enim phasellus et posuere eget magna. Faucibus mi ut quam enim.</p>
                        <div class="image-info">
                          <img src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                          <img src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="history-info">
                      <div class="bullet">
                        <img width="12" height="12" src="{{ asset('img/bullet.svg') }}" alt="">
                      </div>
                      <div class="info-detail">
                        <span class="text-xs clr-grey">10/08/2021</span>
                        <h6 class="text-sm my-2">Program Dirilis</h6>
                        <p class="mb-0 text-xs clr-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet aliquam enim phasellus et posuere eget magna. Faucibus mi ut quam enim.</p>
                        <div class="image-info">
                          <img src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="donaturtab" role="tabpanel" aria-labelledby="donatur-tab">
                    <div class="row px-2 mt-4">
                      @forelse($donates as $donate)
                        <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
                          <div class="card-simple">
                            <h6 class="clr-green text-sm">{{ $donate->is_anonim == 1 ? 'Anonim' : $donate->name }}</h6>
                            <p class="text-xs mb-2 font-medium">Berdonasi sebesar {{ "Rp " . number_format($donate->total_donate,0,",",".") }}</p>
                            <span class="text-xxs">{{ \Carbon\Carbon::parse($donate->created_at)->diffForHumans() }}</span>
                          </div>
                        </a>
                      @empty
                        <div class="empty-state">
                          <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                          <h3 class="mt-5 pt-4 font-semibold">Data Not Found</h3>
                          <p class="text-base font-medium">Sorry, the data you were looking for could not be found</p>
                        </div>
                      @endforelse
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="wrapper-donatur mt-md-0 mt-4">
                <h5>Sedekah Bantu Saudara Dhuafa</h5>
                <div class="d-flex justify-content-between my-3">  
                  <div class="d-center">
                    <ion-icon class="mr-1 text-md" name="location-sharp"></ion-icon>
                    <span class="text-xs font-medium">Rumah Zakat Kecamatan A</span>
                  </div>
                  <div class="d-center">
                    <img class="mr-1" width="16" height="16" src="{{ asset('img/user.svg') }}" alt="">
                    <span class="text-xs font-medium">Kabupaten Mukomuko</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-center mt-2 justify-content-between">
                  <div class="d-flex mr-2">
                    <h6 class="clr-green">RP. 3500.0000</h6>
                    <span class="text-xs clr-grey font-semibold ml-2">Rp 500.000.000</span>
                  </div>
                  <div class="text-right">
                    <span class="text-xs clr-grey">Sisa Hari</span>
                    <h6 class="text-sm">3</h6>
                  </div>
                </div>
                <div class="wrap-share pb-2">
                  <span class="text-xs clr-grey">Bagikan agar target lebih cepat terkumpul:</span>
                  <div class="d-flex mt-2">
                    <a class="clr-grey h5 mr-2">
                      <ion-icon class="ic-sosmed" name="logo-facebook"></ion-icon>
                    </a>
                    <a class="clr-grey h5 mr-2">
                      <ion-icon class="ic-sosmed" name="logo-twitter"></ion-icon>
                    </a>
                    <a class="clr-grey h5 mr-2">
                      <ion-icon class="ic-sosmed" name="logo-whatsapp"></ion-icon>
                    </a>
                  </div>
                </div>
                <form class="form-donatur mt-3">
                  <div class="form-group">
                    <label class="font-semibold" for="">Masukan Nominal Donasi</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group mb-0 d-flex justify-content-between">
                    <label class="font-semibold" for="">Sembunyikan nama saya (Anonim)</label>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group mb-0">
                    <button class="btn w-100 btn-green mt-5 py-2">Lanjut Pembayaran</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <section class="col-12 mt-5 sec-navigation">
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
        <section class="col-12 mt-4 sec-regist">
          <div class="banner-regist">
            <h4 class="banner-title mr-3 mb-0">Yuk! Daftar untuk Mulai Ber - Donasi Membantu Sesama!</h4>
            <a href="" class="btn btn-green btn-regist">Daftar Sekarang Gratis</a>
          </div>
        </section>
        <section class="col-12 mt-5 pt-3 sec-programlist">
          <h4 class="text-center">Program Lainnya!</h4>
          <div class="row mt-4">
            <div class="col-lg-3 col-md-4 col-12 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <p class="text-xs mb-1 font-medium">helo</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">Rp 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">3</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <p class="text-xs mb-1 font-medium">helo</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">Rp 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">3</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-md-4 col-12 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <p class="text-xs mb-1 font-medium">helo</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">Rp 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">3</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                  <span class="tag-cat">Social</span>
                </div>
                <div class="card-detail">
                  <h6>lorem</h6>
                  <p class="text-xs mb-1 font-medium">helo</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">Rp 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">3</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
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