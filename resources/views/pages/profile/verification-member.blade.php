@extends('layouts.app')

@section('title')
  Profile
@endsection

@section('meta')
  <meta name="title" content="Profile - NU CARE">
  <meta name="description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="Profile - NU CARE">
  <meta property="og:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="Profile - NU CARE">
  <meta property="twitter:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="verification-page">
    <div class="container">
      <div class="row align-items-center" style="height: 65vh">
        @if(isset($member))
        <div class="col-xl-8 col-lg-10 col-12 mx-auto">
          <h5 class="clr-green text-center">Anggota Terverifikasi!</h5>
          <div class="row align-items-center mt-4">
            <div class="col-md-4 text-center">
              <img class="avatar-img" src="{{ isset($member->profile->image) ? asset('storage/'.$member->profile->image) : asset('web/img/avatar/avatar-1.png') }}" alt="">
            </div>
            <div class="col-md-8  mt-md-0 mt-4">
              <span>Diberikan kepada</span>
              <div class="d-center">
                <h5 class="mb-0 clr-green">{{ $member->name }}</h5>
                <img class="ml-2" width="32" height="32" src="{{ asset('img/checklist.svg') }}" alt="">
              </div>
              <div class="d-lg-flex justify-content-between">
                <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Bergabung pada</span>
                  <b class="d-block">{{ date('d M Y', strtotime($member->created_at)) }}</b>
                </div>
                 <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">ID Anggota</span>
                  <b class="d-block">{{ $member->id }}</b>
                </div>
              </div>
              <div class="d-lg-flex justify-content-between">
                <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Tingkat Wilayah</span>
                  <b class="d-block">{{ isset($member->role_user->role->name) ? $member->role_user->role->name : 'Belum diatur' }} {{ isset($member->desa->name) ? $member->desa->name : 'Belum diatur' }}</b>
                </div>
                 <div class="mt-3 w-50">
                  <span class="text-xs clr-grey">Tempat & Tanggal Lahir</span>
                  @if(isset($member->profile->birth_place) && isset($member->profile->birth_day))
                  <b class="d-block">{{ isset($member->profile->birth_place) ? $member->profile->birth_place : 'Belum diatur' }}, {{ isset($member->profile->birth_day) ? date('d M Y', strtotime($member->profile->birth_day)) : 'Belum diatur' }}</b>
                  @else
                  <b class="d-block">Belum diatur</b>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="empty-state">
          <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
          <h5 class="mt-4 font-semibold">Anggota tidak ditemukan</h5>
          <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection