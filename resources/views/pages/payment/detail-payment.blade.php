@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/payment.css') }}">
@endsection

@section('content')
  <div class="paymentdetail-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-8 text-center mx-auto">
          <div class="wrap-status box-white">
            <h5 class="mb-4">Pembayaran Melalui Midtrans</h5>
            <h2 class="clr-yellow font-semibold">Pending</h2>
          </div>
          <div class="wrap-detail mt-4 box-white">
            <h5 class="mb-4">Detail Pembayaran</h5>
            <table class="font-semibold w-100">
              <tr>
                <td class="text-left pb-3">Nama Donatur</td>
                <td class="text-right pb-3">Hamba Allah</td>
              </tr>
              <tr>
                <td class="text-left pb-3">Pembayaran</td>
                <td class="text-right pb-3">Zakat Maal</td>
              </tr>
              <tr>
                <td class="text-left">Waktu Transaksi</td>
                <td class="text-right">Jumat, 25 Feb 2021 <span class="ml-2 clr-green">16:42 WIB<span></td>
              </tr>
            </table>
          </div>
          <div class="wrap-payment mt-4 box-white">
            <h5>Yang Dibayar</h5>
            <p class="clr-grey text-base font-medium">Sebentar lagi kamu akan membersihkan hartamu</p>
            <h2 class="clr-green my-4">Rp 100.000,00</h2>
            <p class="clr-grey text-base font-medium">Bayar donasi Anda sebelum <b>25 Februari 2022 17:00 WIB</b> atau donasi Anda otomatis dibatalkan oleh sistem.</p>
          </div>
          <div class="wrap-button mt-4">
            <button class="btn w-100 py-2 btn-green">Bayar Sekarang</button>
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