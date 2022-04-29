@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/payment.css') }}">
@endsection

@section('content')
  <div class="payment-page">
    <div class="container">
      {!! Form::open(['route' => 'payment.process']) !!}
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="box-white">
            <div class="d-flex">
              <img width="26" height="26" src="{{ asset('img/rp-icon.svg') }}" alt="">
              <div class="title-zakat ml-2">
                <h4 class="font-medium">Pembayaran {{ isset($donate->title) ? $donate->title : 'Donasi' }}</h4>
                <p class="text-base clr-grey">Isi jumlah donasi dan temukan kebahagianmu sebentar lagi </p>
              </div>
            </div>
            <label class="text-md font-medium">Jumlah Donasi</label>
            <div class="form-group">
              <div class="d-flex">
                <div class="box-green">Rp.</div>
                <input type="text" class="form-control currency" value="{{ isset(session()->get('donate')['nominal']) ? session()->get('donate')['nominal'] : 0 }}">
              </div>
              <div class="mt-1">
                <span class="text-danger d-block text-xs">Jumlah minimal donasi adalah Rp 10.000,-</span>
                <span class="clr-grey font-italic d-block">Jumlah donasi harus lebih besar dari Rp 10.000,-</span>
              </div>
            </div>
            <div class="form-group">
              <input type="text" placeholder="Nama Lengkap" class="form-control" name="name" value="{{ @session()->get('user')['name'] }}">
              <label class="custom-check-radio mt-2">
                Sembunyikan nama saya (Hamba Allah)
                <input type="checkbox" value="1" name="is_anonim">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" name="email" value="{{ @session()->get('user')['email'] }}">
              <span class="clr-grey mt-2 d-block">Kirim bukti donasi dan kabar perkembangan program melalui email saya.</span>
            </div>
            <div class="form-group">
              <input type="number" placeholder="Nomor Telepon" class="form-control" name="phone" value="{{ @session()->get('user')['phone'] }}">
            </div>
            <div class="form-group">
              <textarea 
                name="message" 
                class="form-control"
                placeholder="Tulis doa atau dukungan untuk program donasi ini" 
                rows="7"></textarea>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-4">
          <div class="box-white">
            <div class="d-flex">
              <img width="26" height="26" src="{{ asset('img/rp-icon.svg') }}" alt="">
              <div class="title-zakat ml-2">
                <h4 class="font-medium">Metode Pembayaran</h4>
                <p class="text-base clr-grey">Pilih metode pembayaran dibawah ini untuk melanjutkan Donasi</p>
              </div>
            </div>
            <div class="accordion method-payment" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Dompet Digital <br>
                      <span class="clr-grey">Pembayaran dengan dompet digital.<span>
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="s">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/dana.png') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Dana</h6>
                        <p class="mb-0">Pembayaran melalui digital dana</p>
                      </div>
                    </div>
                    <div class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="payment">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/dana.png') }}" alt="">
                      </div>
                      <div class="detail">
                        <h5>Dana</h5>
                        <p class="mb-0">Pembayaran melalui digital dana</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Virtual Account <br>
                      <span  class="clr-grey">Bayar di ATM atau Internet Banking </span>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="payment">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/dana.png') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Dana</h6>
                        <p class="mb-0">Pembayaran melalui digital dana</p>
                      </div>
                    </div>
                    <div class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="payment">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/dana.png') }}" alt="">
                      </div>
                      <div class="detail">
                        <h5>Dana</h5>
                        <p class="mb-0">Pembayaran melalui digital dana</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <label class="custom-check-radio">
              Saya setuju dengan syarat dan ketentuan yang berlaku
              <input type="checkbox" value="option1">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="form-group mt-4">
            <button class="btn py-2 btn-green w-100">Lanjut Pembayaran</button>
          </div>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection