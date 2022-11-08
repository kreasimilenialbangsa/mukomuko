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
  <div class="notification-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <x-sidebar-profile/>
        </div>
        <div class="col-md-9">
          <div class="box-white h-100 p-4">
            <h5>Notifikasi</h5>
            <div class="list-notifs row custom-scrollbar" style="max-height: 800px">
              @forelse($notifications as $key => $notification)
              <div class="col-lg-6 mt-3">
                <div class="item-notif {{ date('Y-m-d', strtotime($notification->created_at)) == date('Y-m-d') ? 'new-notif' : '' }}">
                  <div class="d-flex mb-2">
                    <div class="mr-2">
                      <h6 class="mb-1">{{ $notification->title }}</h6>
                      <b class="d-block font-medium">{!! $notification->body !!}</b>
                    </div>
                    <span class="text-xs w-50 text-right clr-grey">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                  </div>
                  <img class="thumb-img w-100" src="{{ $notification->image }}" alt="{{ $notification->title }}">
                </div>
              </div>
              @empty
              <div class="empty-state">
                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                <h5 class="mt-4 font-semibold">Data Tidak Ditemukan</h5>
                <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
              </div>
              @endforelse
              <div class="d-flex mt-3 justify-content-center">
                {{ $notifications->links('vendor.pagination.bootstrap-4') }}
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