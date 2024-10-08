@extends('layouts.app')

@section('title')
  Pembayaran
@endsection

@section('meta')
  <meta name="title" content="Pembayaran - NU CARE">
  <meta name="description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="Pembayaran - NU CARE">
  <meta property="og:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="Pembayaran - NU CARE">
  <meta property="twitter:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/payment.css') }}">
@endsection

@section('content')
  <div class="payment-page">
    <div class="container">
      {!! Form::open(['route' => 'payment.process']) !!}
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="box-white wrapper-left">
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
                <input type="text" class="form-control currency" value="{{ isset(session()->get('donate')['nominal']) ? session()->get('donate')['nominal'] : 0 }}" name="nominal" style="border-radius: 0 .25rem .25rem 0rem">
              </div>
              <div class="mt-1">
              </div>
              @if($errors->has('nominal'))
                <div class="text-danger">{{ $errors->first('nominal') }}</div>
              @else
                <span class="clr-grey font-italic d-block">Jumlah donasi harus lebih besar dari Rp 10.000,-</span>
              @endif
            </div>
            <div class="form-group">
              <input type="text" placeholder="Nama Lengkap" class="form-control" name="name" value="{{ @session()->get('user')['name'] }}">
              @if($errors->has('name'))
                  <div class="text-danger">{{ $errors->first('name') }}</div>
              @endif
              <label class="custom-check-radio mt-2">
                Sembunyikan nama saya (Hamba Allah)
                <input type="checkbox" value="1" name="is_anonim">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control" name="email" value="{{ @session()->get('user')['email'] }}" {{ isset(session()->get('user')['email']) ? 'readonly' : '' }}>
              @if($errors->has('email'))
                  <div class="text-danger">{{ $errors->first('email') }}</div>
              @endif
              <span class="clr-grey mt-2 d-block">Kirim bukti donasi dan kabar perkembangan program melalui email saya.</span>
            </div>
            <div class="form-group">
              <input type="number" placeholder="Nomor Telepon" class="form-control" name="phone" value="{{ @session()->get('user')['phone'] }}">
              @if($errors->has('phone'))
                  <div class="text-danger">{{ $errors->first('phone') }}</div>
              @endif
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
          <div class="box-white wrapper-right">
            <div class="d-flex">
              <img width="26" height="26" src="{{ asset('img/rp-icon.svg') }}" alt="">
              <div class="title-zakat ml-2">
                <h4 class="font-medium">Metode Pembayaran</h4>
                <p class="text-base clr-grey">Pilih metode pembayaran dibawah ini untuk melanjutkan Donasi</p>
              </div>
            </div>
            <div class="accordion method-payment" id="method-payment">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn d-center w-100 justify-content-between text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <div>
                        Dompet Digital <br>
                        <span class="clr-grey">Pembayaran dengan dompet digital.<span>
                      </div>
                      <ion-icon class="text-base ic-arr" name="chevron-forward-outline"></ion-icon>
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show">
                  <div class="card-body">
                    {{-- Gopay --}}
                    <label for="gopay" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="gopay" id="gopay">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/log-gopay.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>GoPay</h6>
                        <p class="mb-0">Pembayaran melalui GoPay</p>
                      </div>
                    </label>

                    {{-- Shopeepay --}}
                    {{-- <label for="shopeepay" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="shopeepay" id="shopeepay">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/shoopepay.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>ShopeePay</h6>
                        <p class="mb-0">Pembayaran melalui ShopeePay</p>
                      </div>
                    </label> --}}

                    {{-- DANA --}}
                    {{-- <label for="ID_DANA" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="ID_DANA" id="ID_DANA">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/dana.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>DANA</h6>
                        <p class="mb-0">Pembayaran melalui DANA</p>
                      </div>
                    </label> --}}

                    {{-- OVO --}}
                    {{-- <label for="ID_OVO" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="ID_OVO" id="ID_OVO">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/ovo.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>OVO</h6>
                        <p class="mb-0">Pembayaran melalui OVO</p>
                      </div>
                    </label> --}}

                    {{-- LINK --}}
                    {{-- <label for="ID_LINKAJA" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="ID_LINKAJA" id="ID_LINKAJA">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/link-aja.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>LINK AJA</h6>
                        <p class="mb-0">Pembayaran melalui LINK AJA</p>
                      </div>
                    </label> --}}

                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn d-center w-100 justify-content-between text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <div>
                        Virtual Account <br>
                        <span  class="clr-grey">Bayar di ATM atau Internet Banking </span>
                      </div>
                      <ion-icon class="text-base ic-arr" name="chevron-forward-outline"></ion-icon>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse show">
                  <div class="card-body">

                    {{-- BRI --}}
                    <label for="bri_va" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="bri_va" id="bri_va">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/briva.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Virtual Account BRI</h6>
                        <p class="mb-0">Bayar di ATM BRI atau Internet Banking</p>
                      </div>
                    </label>

                    {{-- BCA --}}
                    {{-- <label for="bca_va" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="bca_va" id="bca_va">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/bca.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Virtual Account BCA</h6>
                        <p class="mb-0">Bayar di ATM BCA atau Internet Banking</p>
                      </div>
                    </label> --}}

                    {{-- Mandiri --}}
                    <label for="echannel" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="echannel" id="echannel">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/logo-mandiri.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Virtual Account Mandiri</h6>
                        <p class="mb-0">Bayar di ATM Mandiri atau Internet Banking</p>
                      </div>
                    </label>

                    {{-- BNI --}}
                    <label for="bni_va" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="bni_va" id="bni_va">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/bni.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Virtual Account BNI</h6>
                        <p class="mb-0">Bayar di ATM BNI atau Internet Banking</p>
                      </div>
                    </label>

                    {{-- Permata --}}
                    <label for="permata_va" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="permata_va" id="permata_va">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/logo-permata.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Virtual Account Permata</h6>
                        <p class="mb-0">Bayar di ATM Permata atau Internet Banking</p>
                      </div>
                    </label>

                    {{-- ATM Bersama --}}
                    {{-- <label for="other_va" class="d-center item-payment mb-3">
                      <div class="d-center mr-3">
                        <label class="custom-check-radio">
                          <input type="radio" name="channel" value="other_va" id="other_va">
                          <span class="checkmark"></span>
                        </label>
                        <img class="logo-payment" src="{{ asset('img/payment/logo-other.webp') }}" alt="">
                      </div>
                      <div class="detail">
                        <h6>Jaringan ATM</h6>
                        <p class="mb-0">Bayar di ATM Bersama, Prima, Alto, dll</p>
                      </div>
                    </label> --}}

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <label class="custom-check-radio">
              Saya setuju dengan syarat dan ketentuan yang berlaku
              <input type="checkbox" name="agreement">
              <span class="checkmark"></span>
              @if($errors->has('agreement'))
                  <div class="invalid-feedback">{{ $errors->first('agreement') }}</div>
              @endif
            </label>
          </div>
          <div class="form-group mt-4">
            <button class="btn py-2 btn-green w-100" id="button-save" type="submit" disabled>Lanjut Pembayaran</button>
          </div>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      var check1 = $('input[name=agreement]').is(":checked");

      if(check1 == true) {
        $('#button-save').removeAttr('disabled');
      } else {
        $('#button-save').attr('disabled', 'disabled');
      }
    });

    $('input[name=agreement]').on('click', function(){
      var check2 = $(this).is(":checked");

      if(check2 == true) {
        $('#button-save').removeAttr('disabled');
      } else {
        $('#button-save').attr('disabled', 'disabled');
      }
    });
  </script>
@endsection