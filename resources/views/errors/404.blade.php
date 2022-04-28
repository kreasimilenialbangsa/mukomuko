@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="verification-page">
    <div class="container">
      <div class="row align-items-center" style="height: 65vh">
        <div class="empty-state">
          <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
          <h5 class="mt-4 font-semibold">404 Data Tidak Ditemukan</h5>
          <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection