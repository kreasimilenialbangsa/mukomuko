@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/program.css') }}">
@endsection

@section('content')
  <div class="home-page">
    <div class="container">
    <div class="cus-breadcrumb">
        <span>Beranda</span> / <span class="current">Program</span>
      </div>
      <div class="row">
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
          <div class="text-center mt-3">
            <a href="" class="btn btn-green px-3">
              <div class="d-center">
                Lihat Semua
                <ion-icon class="ml-2" name="chevron-down-outline"></ion-icon>
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
  </script>
@endsection