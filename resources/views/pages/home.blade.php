@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endsection

@section('content')
  <div class="home-page">
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
        <section class="col-lg-10 col-md-11 mx-auto sec-handout">
          <div class="wrapper-summary">
            <div class="row text-center">
              <div class="col-md-3">
                <img class="icon-fitur" height="64" width="64" src="{{ asset('img/manfaat.svg') }}" alt="">
                <h6 class="clr-green mt-2 mb-0">34.232.232</h6>
                <span class="clr-grey font-medium">Penerima Manfaat</span>
              </div>
              <div class="col-md-3">
                <img class="icon-fitur" height="64" width="64" src="{{ asset('img/himpunan.svg') }}" alt="">
                <h6 class="clr-green mt-2 mb-0">34.232.232</h6>
                <span class="clr-grey font-medium">Penerima Manfaat</span>
              </div>
              <div class="col-md-3">
                <img class="icon-fitur" height="64" width="64" src="{{ asset('img/penyaluran.svg') }}" alt="">
                <h6 class="clr-green mt-2 mb-0">34.232.232</h6>
                <span class="clr-grey font-medium">Penerima Manfaat</span>
              </div>
              <div class="col-md-3">
                <img class="icon-fitur" height="64" width="64" src="{{ asset('img/donatur.png') }}" alt="">
                <h6 class="clr-green mt-2 mb-0">34.232.232</h6>
                <span class="clr-grey font-medium">Donatur</span>
              </div>
            </div>
          </div>
          <div class="wrapper-handout">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="zakat-tab" data-toggle="tab" href="#zakat" role="tab" aria-controls="zakat" aria-selected="true">
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8333 3.33329H9.83333C9.09696 3.33329 8.5 3.93025 8.5 4.66663C8.5 5.403 9.09696 5.99996 9.83333 5.99996H17.8333C18.5697 5.99996 19.1667 5.403 19.1667 4.66663C19.1667 3.93025 18.5697 3.33329 17.8333 3.33329ZM9.83333 0.666626C7.6242 0.666626 5.83333 2.45749 5.83333 4.66663C5.83333 6.87576 7.6242 8.66663 9.83333 8.66663H17.8333C20.0425 8.66663 21.8333 6.87576 21.8333 4.66663C21.8333 2.45749 20.0425 0.666626 17.8333 0.666626H9.83333ZM6.33563 6.60933C2.81305 9.86624 0.5 14.9585 0.5 19.0838C0.5 25.7113 6.46953 27.3338 13.8333 27.3338C21.1971 27.3338 27.1667 25.7113 27.1667 19.0838C27.1667 14.9585 24.8536 9.86624 21.3311 6.60933C20.8864 7.40851 20.1757 8.03936 19.3188 8.38232C19.96 8.95087 20.576 9.61271 21.1548 10.3585C23.2792 13.0961 24.5 16.4733 24.5 19.0838C24.5 20.3286 24.2244 21.1661 23.8548 21.7598C23.4832 22.3572 22.9096 22.8789 22.0472 23.32C20.2216 24.2537 17.4216 24.6672 13.8333 24.6672C10.2451 24.6672 7.44505 24.2537 5.61952 23.32C4.75701 22.8789 4.18352 22.3572 3.8118 21.7598C3.44228 21.1661 3.16667 20.3286 3.16667 19.0838C3.16667 16.4733 4.38743 13.0961 6.51192 10.3585C7.09072 9.61271 7.70668 8.95087 8.34792 8.38232C7.49096 8.03936 6.78032 7.40849 6.33563 6.60933ZM9.5 14C9.5 13.8158 9.64924 13.6666 9.83333 13.6666H11.1667C11.3508 13.6666 11.5 13.8158 11.5 14V15.3333C11.5 15.5174 11.3508 15.6666 11.1667 15.6666H9.5V14ZM7.5 14V16.6658V20C7.5 20.5522 7.94772 21 8.5 21C9.05228 21 9.5 20.5522 9.5 20V18.4329L10.1757 18.8382C10.5838 19.0832 10.8335 19.5242 10.8335 20.0001C10.8335 20.5524 11.2812 21.0001 11.8335 21.0001C12.3857 21.0001 12.8335 20.5524 12.8335 20.0001C12.8335 19.0758 12.4531 18.2046 11.8013 17.5793C12.7816 17.3028 13.5 16.402 13.5 15.3333V14C13.5 12.7113 12.4553 11.6666 11.1667 11.6666H9.83333C8.54467 11.6666 7.5 12.7113 7.5 14ZM16.1667 14C16.1667 13.8158 16.3159 13.6666 16.5 13.6666H17.8333C18.0175 13.6666 18.1667 13.8158 18.1667 14V15.3333C18.1667 15.5174 18.0175 15.6666 17.8333 15.6666H16.1667V14ZM17.8333 17.6666H16.1667V20C16.1667 20.5522 15.7189 21 15.1667 21C14.6144 21 14.1667 20.5522 14.1667 20V14C14.1667 12.7113 15.2113 11.6666 16.5 11.6666H17.8333C19.122 11.6666 20.1667 12.7113 20.1667 14V15.3333C20.1667 16.622 19.122 17.6666 17.8333 17.6666Z" fill="black"/>
                  </svg>
                  Zakat
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="infak-tab" data-toggle="tab" href="#infak" role="tab" aria-controls="infak" aria-selected="false">
                  <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.4961 2.66669C17.8161 2.66669 14.8294 5.65335 14.8294 9.33335C14.8294 13.0134 17.8161 16 21.4961 16C25.1761 16 28.1628 13.0134 28.1628 9.33335C28.1628 5.65335 25.1761 2.66669 21.4961 2.66669ZM21.4961 13.3334C19.2828 13.3334 17.4961 11.5467 17.4961 9.33335C17.4961 7.12002 19.2828 5.33335 21.4961 5.33335C23.7094 5.33335 25.4961 7.12002 25.4961 9.33335C25.4961 11.5467 23.7094 13.3334 21.4961 13.3334ZM25.4961 21.3334H22.8294C22.8294 19.7334 21.8294 18.2934 20.3361 17.7334L12.1228 14.6667H1.49609V29.3334H9.49609V27.4134L18.8294 30L29.4961 26.6667V25.3334C29.4961 23.12 27.7094 21.3334 25.4961 21.3334ZM6.82943 26.6667H4.16276V17.3334H6.82943V26.6667ZM18.7894 27.2134L9.49609 24.6667V17.3334H11.6428L19.4028 20.2267C19.8561 20.4 20.1628 20.84 20.1628 21.3334C20.1628 21.3334 17.4961 21.2667 17.0961 21.1334L13.9228 20.08L13.0828 22.6134L16.2561 23.6667C16.9361 23.8934 17.6428 24 18.3628 24H25.4961C26.0161 24 26.4828 24.32 26.6961 24.76L18.7894 27.2134Z" fill="black"/>
                  </svg>
                  Infak
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="wakaf" aria-selected="false">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6654 26.6667C15.2427 26.6667 17.332 24.5774 17.332 22C17.332 19.4227 15.2427 17.3334 12.6654 17.3334C10.088 17.3334 7.9987 19.4227 7.9987 22C7.9987 24.5774 10.088 26.6667 12.6654 26.6667ZM12.6654 29.3334C16.7155 29.3334 19.9987 26.0502 19.9987 22C19.9987 17.9499 16.7155 14.6667 12.6654 14.6667C8.61527 14.6667 5.33203 17.9499 5.33203 22C5.33203 26.0502 8.61527 29.3334 12.6654 29.3334Z" fill="black"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.6667 30.6667H4V28H22.6667V30.6667Z" fill="black"/>
                    <path d="M5.33203 11.3334H7.9987C7.9987 12.9334 8.9987 14.3734 10.492 14.9334L18.7054 18H29.332V3.33335H21.332V5.25335L11.9987 2.66669L1.33203 6.00002V7.33335C1.33203 9.54669 3.1187 11.3334 5.33203 11.3334ZM23.9987 6.00002H26.6654V15.3334H23.9987V6.00002ZM12.0387 5.45335L21.332 8.00002V15.3334H19.1854L11.4254 12.44C10.972 12.2667 10.6654 11.8267 10.6654 11.3334C10.6654 11.3334 13.332 11.4 13.732 11.5334L16.9054 12.5867L17.7454 10.0534L14.572 9.00002C13.892 8.77335 13.1854 8.66669 12.4654 8.66669H5.33203C4.81203 8.66669 4.34537 8.34669 4.13203 7.90669L12.0387 5.45335Z" fill="black"/>
                  </svg>
                  Wakaf
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
        </section>
        <section class="col-12 sec-todonation">
          <h4 class="text-center">Donasi Hari Ini</h4>
          <div class="row mt-4">
            <a href="" class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 block">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
          </div>
          <div class="text-center mt-3">
            <a href="" class="btn btn-green py-2 px-3">
              <div class="d-center">
                Lihat Semua
                <ion-icon class="ml-2" name="chevron-down-outline"></ion-icon>
              </div>
            </a>
          </div>
        </section>
        <section class="col-12 mt-5 pt-3 sec-aydonation">
          <h4 class="text-center">Ayo Mulai Berdonasi!</h4>
          <div class="row mt-4">
            <div class="col-lg-3 col-md-4 col-6 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Kemanusiaan</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B</h6>
                  <p class="text-xs mb-1 font-medium">Rumah Zakat Kecamatan A</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">RP 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">32</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 p-3">
              <div class="card-thumbnail">
                <div class="thumb-pict">
                  <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <span class="tag-cat">Kemanusiaan</span>
                </div>
                <div class="card-detail">
                  <h6>Sedekah Makanan Gratis untuk Desa B</h6>
                  <p class="text-xs mb-1 font-medium">Rumah Zakat Kecamatan A</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex mt-2 justify-content-between">
                    <div class="w-left mr-2">
                      <span class="text-xs clr-grey">Terkumpul</span>
                      <h6 class="text-sm">RP 3.500.000</h6>
                    </div>
                    <div class="w-right text-right">
                      <span class="text-xs clr-grey">Sisa Hari</span>
                      <h6 class="text-sm">32</h6>
                    </div>
                  </div>
                  <a href="" class="mt-2 btn btn-green w-100">Ikut Donasi</a>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <a href="" class="btn btn-green px-3">
              <div class="d-center">
                Lihat Semua
                <ion-icon class="ml-2" name="chevron-down-outline"></ion-icon>
              </div>
            </a>
          </div>
        </section>
        <section class="col-12 mt-5 pt-3 sec-news">
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
          <div class="text-center mt-4">
            <a href="" class="btn btn-green py-2 px-3">
              <div class="d-center">
                Lihat Semua
                <ion-icon class="ml-2" name="chevron-down-outline"></ion-icon>
              </div>
            </a>
          </div>
        </section>
        <section class="col-md-11 mx-auto mt-5 pt-3 sec-gallery">
          <h4 class="text-center">Galeri</h4>
          <div class="position-relative mt-3">
            <div class="slider-gallery">
              <div>
                <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                <div class="slider-detail">
                  <p>
                    Acara senam pagi dan jogging yang di laksanakan pada...
                  </p>
                </div>
              </div>
              <div>
                <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                <div class="slider-detail">
                  <p>
                    Acara senam pagi dan jogging yang di laksanakan pada...
                  </p>
                </div>
              </div>
              <div>
                <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                <div class="slider-detail">
                  <p>
                    Acara senam pagi dan jogging yang di laksanakan pada...
                  </p>
                </div>
              </div>
              <div>
                <img class="slider-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                <div class="slider-detail">
                  <p>
                    Acara senam pagi dan jogging yang di laksanakan pada...
                  </p>
                </div>
              </div>
            </div>
            <div class="slider-arrows">
              <div class="prev-slider wrap-arrow" id="prev-slider">
                <img height="12" width="12" src="{{ asset('img/arrow-left.svg') }}" alt="">
              </div>
              <div class="next-slider wrap-arrow" id="next-slider">
                <img height="12" width="12" src="{{ asset('img/arrow-right.svg') }}" alt="">
              </div>
            </div>
          </div>
        </section>
        <section class="col-12 mt-5 pt-3 sec-regist">
          <div class="banner-regist">
            <h4 class="banner-title mr-3 mb-0">Yuk! Daftar untuk Mulai Ber - Donasi Membantu Sesama!</h4>
            <a href="" class="btn btn-green btn-regist">Daftar Sekarang Gratis</a>
          </div>
        </section>
        <section class="col-md-9 mx-auto mt-5 pt-3 sec-mitra">
          <h4 class="text-center">Mitra LAZISNU Mukomuko</h4>
          <div class="position-relative mt-3">
            <div class="slider-mitra">
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
              <div>
                <div class="box-mitra">
                  <img class="slider-img" src="{{ asset('img/gopay.png') }}" alt="">
                </div>
              </div>
            </div>
            <div class="slider-arrows">
              <div class="prev-slider wrap-arrow" id="prev-slider2">
                <img height="12" width="12" src="{{ asset('img/arrow-left.svg') }}" alt="">
              </div>
              <div class="next-slider wrap-arrow" id="next-slider2">
                <img height="12" width="12" src="{{ asset('img/arrow-right.svg') }}" alt="">
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
    $('.slider-donate').slick({
      dots: true,
      arrows: false
    });
    $('.slider-gallery').slick({
      infinite: true,
      dots: true,
      arrows: true,
      autoplay: true,
      prevArrow: $('#prev-slider'),
      nextArrow: $('#next-slider'),
      slidesToShow: 3,
      slidesToScroll: 3
    });
    $('.slider-mitra').slick({
      infinite: true,
      dots: true,
      arrows: true,
      autoplay: true,
      prevArrow: $('#prev-slider2'),
      nextArrow: $('#next-slider2'),
      slidesToShow: 6,
      slidesToScroll: 6
    });
    console.log('haha')
  </script>
@endsection