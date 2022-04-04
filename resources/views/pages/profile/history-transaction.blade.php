@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="historytrans-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('layouts.sidebar-profile')
        </div>
        <div class="col-md-9">
          <div class="box-white p-4">
            <h5>Riwayat Transaksi</h5>
            <div class="wrap-history">
              <div class="d-center border-bottom py-4 justify-content-between">
                <div class="type">
                  <h6>Zakat Maal</h6>
                  <div class="date-price">
                    <span class="clr-grey">23 Feb 2022 |</span>
                    <span class="clr-green">Rp 25.000,00</span>
                  </div>
                </div>
                <div class="pill-status yellow">
                  Pending
                </div>
              </div>
              <div class="d-center border-bottom py-4 justify-content-between">
                <div class="type">
                  <h6>Zakat Maal</h6>
                  <div class="date-price">
                    <span class="clr-grey">23 Feb 2022 |</span>
                    <span class="clr-green">Rp 25.000,00</span>
                  </div>
                </div>
                <div class="pill-status green">
                  Success
                </div>
              </div>
               <div class="d-center border-bottom py-4 justify-content-between">
                <div class="type">
                  <h6>Zakat Maal</h6>
                  <div class="date-price">
                    <span class="clr-grey">23 Feb 2022 |</span>
                    <span class="clr-green">Rp 25.000,00</span>
                  </div>
                </div>
                <div class="pill-status gray">
                  Kadaluwarsa
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