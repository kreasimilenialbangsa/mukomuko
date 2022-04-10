@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="notification-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('layouts.sidebar-profile')
        </div>
        <div class="col-md-9">
          <div class="box-white h-100 p-4">
            <h5>Notifikasi</h5>
            <div class="list-notifs row custom-scrollbar" style="max-height: 800px">
              <div class="col-lg-6 mt-3">
                <div class="item-notif">
                  <div class="d-flex mb-2">
                    <div class="mr-2">
                      <h6 class="mb-1">Rp 1.000 Bisa Buat Donasi, Lho!</h6>
                      <b class="d-block font-medium">Berbuat kebaikan tanpa halangan. Yuk, rutinkan berdonasi lewat apikasi Lazisnu</b>
                    </div>
                    <span class="text-xs w-50 text-right clr-grey">2 menit lalu</span>
                  </div>
                  <img class="thumb-img w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                </div>
              </div>
              <div class="col-lg-6 mt-3">
                <div class="item-notif new-notif">
                  <div class="d-flex mb-2">
                    <div class="mr-2">
                      <h6 class="mb-1">Rp 1.000 Bisa Buat Donasi, Lho!</h6>
                      <b class="d-block font-medium">Berbuat kebaikan tanpa halangan. Yuk, rutinkan berdonasi lewat apikasi Lazisnu</b>
                    </div>
                    <span class="text-xs w-50 text-right clr-grey">2 menit lalu</span>
                  </div>
                  <img class="thumb-img w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
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