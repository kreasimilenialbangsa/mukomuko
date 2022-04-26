@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/pages/payment.css') }}">
@endsection

@section('content')
  <div class="payment-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="box-white">
            <div class="d-flex">
              <img width="26" height="26" src="{{ asset('img/rp-icon.svg') }}" alt="">
              <div class="title-zakat ml-2">
                <h3 class="font-medium">Pembayaran {{ isset($donate->title) ? $donate->title : 'Donasi' }}</h3>
                <p>Isi jumlah donasi dan temukan kebahagianmu sebentar lagi</p>
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
              <input type="text" placeholder="Nama Lengkap" class="form-control">
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" value="">
                <label class="form-check-label" for="inlineCheckbox1">Sembunyikan nama saya (Hamba Allah)</label>
              </div>
            </div>
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control">
              <span>Kirim bukti donasi dan kabar perkembangan program melalui email saya.</span>
            </div>
            <div class="form-group">
              <input type="number" placeholder="Nomor Telepon" class="form-control">
            </div>
            <div class="form-group">
              <textarea 
                name="doa" 
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
                <h3 class="font-medium">Metode Pembayaran</h3>
                <p>Pilih metode pembayaran dibawah ini untuk melanjutkan Donasi</p>
              </div>
            </div>
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Dompet Digital <br>
                      Pembayaran dengan dompet digital.
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Virtual Account <br>
                      Bayar di ATM atau Internet Banking
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    Some placeholder content for the second accordion panel. This panel is hidden by default.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline mt-3">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Saya setuju dengan syarat dan ketentuan yang berlaku</label>
            </div>
          </div>
          <div class="form-group">
            <button class="btn py-2 btn-green w-100">Lanjut Pembayaran</button>
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