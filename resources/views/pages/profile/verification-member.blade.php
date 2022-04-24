@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="verification-page">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-10 col-12 mx-auto">
          <h5 class="clr-green text-center">Anggota Terverifikasi!</h5>
          <div class="row align-items-center mt-4">
            <div class="col-md-4 text-center">
              <img class="avatar-img" src="{{ asset('img/dummy-1.jpg') }}" alt="">
            </div>
            <div class="col-md-8  mt-md-0 mt-4">
              <span>Diberikan kepada</span>
              <div class="d-center">
                <h5 class="mb-0 clr-green">Aldian Yoga Pratama</h5>
                <img class="ml-2" width="32" height="32" src="{{ asset('img/checklist.svg') }}" alt="">
              </div>
              <div class="d-lg-flex justify-content-between">
                <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Diberikan pada</span>
                  <b class="d-block">12 Maret 202</b>
                </div>
                 <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Diberikan pada</span>
                  <b class="d-block">12 Maret 202</b>
                </div>
              </div>
              <div class="d-lg-flex justify-content-between">
                <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Pekerjaan</span>
                  <b class="d-block">Head of Design</b>
                </div>
                 <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Tempat & Tanggal Lahir</span>
                  <b class="d-block">Sumedang, 17 Maret 1992</b>
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