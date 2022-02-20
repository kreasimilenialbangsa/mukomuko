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
        <section class="col-12 my-3 sec-detail">
          <div class="row">
            <div class="col-md-8">
              <div class="thumb-headline">
                <img class="w-100" src="{{ asset('img/bg-ziwaf.jpg') }}" alt="">
                <span class="tag-cat">Social</span>
              </div>
              <div class="wrapper-detail">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="zakat-tab" data-toggle="tab" href="#zakat" role="tab" aria-controls="zakat" aria-selected="true">
                      Detail
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="infak-tab" data-toggle="tab" href="#infak" role="tab" aria-controls="infak" aria-selected="false">
                      Kabar Terbaru
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="wakaf" aria-selected="false">
                      Donatur <span class="clr-green">(16)</span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="zakat" role="tabpanel" aria-labelledby="zakat-tab">
                    <h4>Ayo hitung zakat kamu!</h4>
                    <div class="cat-select mb-3">
                      <select class="form-control">
                        <option>Zakat Maal</option>
                        <option>Zakat</option>
                      </select>
                    </div>
                    <p class="font-medium clr-grey">
                      Coba masukkan jumlah hartamu dan kalkulator kami akan menghitung jumlah zakatnya.
                    </p>
                    <div class="form-group">
                      <label class="font-semibold text-sm" for="total">Kekayaan 1 Tahun</label>
                      <input type="number" value="60.000" class="form-control total-input" name="total">
                    </div>
                    <h6 class="text-sm clr-grey">Zakat Maal Kamu</h6>
                    <h6 class="clr-green">1.500.000</h6>
                    <div class="text-right">
                      <button class="btn btn-green">Bayar Zakat</button>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="infak" role="tabpanel" aria-labelledby="infak-tab">
                    <h4>Ayo mulai infak!</h4>
                    <div class="cat-select mb-3">
                      <select class="form-control">
                        <option>Hai Santri</option>
                        <option>Zakat</option>
                      </select>
                    </div>
                    <p class="font-medium clr-grey">
                      Silakan isi jumlah infakmu. Insya Allah berkah.
                    </p>
                    <div class="form-group mb-4">
                      <label class="font-semibold text-sm" for="total">Nominal Infak</label>
                      <input type="number" value="60.000" class="form-control total-input" name="total">
                    </div>
                    <div class="text-right">
                      <button class="btn btn-green">Bayar Infak</button>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab">
                    <h4>Ayo mulai wakaf!</h4>
                    <div class="cat-select mb-3">
                      <select class="form-control">
                        <option>Wakaf Umum</option>
                        <option>Zakat</option>
                      </select>
                    </div>
                    <p class="font-medium clr-grey">
                      Mari wakaf tunai bersama kami!
                    </p>
                    <div class="form-group mb-4">
                      <label class="font-semibold text-sm" for="total">Nominal Wakaf</label>
                      <input type="number" value="60.000" class="form-control total-input" name="total">
                    </div>
                    <div class="text-right">
                      <button class="btn btn-green">Bayar Wakaf</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="wrapper-donatur">
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
                  <div class="form-group d-flex justify-content-between">
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
            </div> <div class="col-lg-3 col-md-4 col-12 p-3">
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