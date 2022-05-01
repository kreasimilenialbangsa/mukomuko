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
            <h5 class="mb-4">Pembayaran Melalui {{ $donate->is_payment == 1 ? 'Midtrans' : 'Xendit' }}</h5>
            @if($donate->is_confirm == 0)
            <h2 class="clr-yellow font-semibold">PENDING</h2>
            @elseif($donate->is_confirm == 1)
            <h2 class="clr-green font-semibold">BERHASIL</h2>
            @elseif($donate->is_confirm == 2)
            <h2 class="text-danger font-semibold">KEDALUWARSA</h2>
            @endif
          </div>
          <div class="wrap-detail mt-4 box-white">
            <h5 class="mb-4">Detail Pembayaran</h5>
            <table class="font-semibold w-100">
              <tr>
                <td class="text-left pb-3">Nama Donatur</td>
                <td class="text-right pb-3">{{ $donate->is_anonim == 0 ? $donate->name : 'Hamba Allah' }}</td>
              </tr>
              <tr>
                <td class="text-left pb-3">Pembayaran</td>
                <td class="text-right pb-3">{{ $type->title }}</td>
              </tr>
              <tr>
                <td class="text-left">Waktu Transaksi</td>
                <td class="text-right">{{ $donate->date }} - <span class="clr-green">{{ date('H:i', strtotime($donate->created_at)) }} WIB<span></td>
              </tr>
            </table>
          </div>
          <div class="wrap-payment mt-4 box-white">
            <h5>Yang Dibayar</h5>
            <p class="clr-grey text-base font-medium">Sebentar lagi kamu akan membersihkan hartamu</p>
            <h2 class="clr-green my-4">{{ "Rp " . number_format($donate->total_donate,2,",",".") }}</h2>
            <p class="clr-grey text-base font-medium">Bayar donasi Anda sebelum <b>{{ $donate->end_payment }} WIB</b> atau donasi Anda otomatis dibatalkan oleh sistem.</p>
          </div>
          <div class="wrap-button mt-4">
            <a href="{{ $donate->order_url }}" class="btn w-100 py-2 btn-green">{{ $donate->is_confirm == 0 ? 'Bayar Sekarang' : 'Cek Status Pembayaran' }}</a>
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