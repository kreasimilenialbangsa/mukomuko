@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="inbox-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('layouts.sidebar-profile')
        </div>
        <div class="col-md-9">
          <div class="box-white h-100 p-4">
            <h5>Inbox</h5>
            <div class="list-inboxs row custom-scrollbar" style="max-height: 800px">
              <div class="col-lg-6 mt-3">
                <div class="d-center item-inbox">
                  <img class="thumb-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <div class="ml-3">
                    <h6 class="mb-1">Pencairan Dana Rp 50.000.000</h6>
                    <b class="d-block font-medium">Sedekah Makanan Gratis Desa A</b>
                    <span class="text-xs clr-grey">Donasi terakhir 8 Agustus 2021</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mt-3">
                <div class="d-center item-inbox new-notif">
                  <img class="thumb-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <div class="ml-3">
                    <h6 class="mb-1">Pencairan Dana Rp 50.000.000</h6>
                    <b class="d-blockfont-medium">Sedekah Makanan Gratis Desa A</b>
                    <span class="text-xs clr-grey">Donasi terakhir 8 Agustus 2021</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mt-3">
                <div class="d-center item-inbox">
                  <img class="thumb-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <div class="ml-3">
                    <h6 class="mb-1">Pencairan Dana Rp 50.000.000</h6>
                    <b class="d-block font-medium">Sedekah Makanan Gratis Desa A</b>
                    <span class="text-xs clr-grey">Donasi terakhir 8 Agustus 2021</span>
                  </div>
                </div>
              </div>
               <div class="col-lg-6 mt-3">
                <div class="d-center item-inbox new-notif">
                  <img class="thumb-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                  <div class="ml-3">
                    <h6 class="mb-1">Pencairan Dana Rp 50.000.000</h6>
                    <b class="d-block font-medium">Sedekah Makanan Gratis Desa A</b>
                    <span class="text-xs clr-grey">Donasi terakhir 8 Agustus 2021</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection