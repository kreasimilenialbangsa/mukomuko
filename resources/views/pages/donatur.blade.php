@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="donatur-page">
    <div class="container">
      <div class="row">
        <section class="col-12 mb-4 sec-filter">
          <h4 class="text-center">Donasi</h4>
          <div class="d-center mt-5 justify-content-between">
            <div class="group-filter d-flex">
              <div class="dropdown dropdown-cat mr-2">
                <button class="btn btn-green font-weight-normal p-3 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Pilih Kecamatan
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdowncat">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </div>
              <div class="dropdown dropdown-cat mr-2">
                <button class="btn btn-green font-weight-normal p-3 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Pilih Desa
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdowncat">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </div>
              <div class="dropdown dropdown-cat mr-2">
                <button class="btn btn-green font-weight-normal p-3 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Pilih Program
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdowncat">
                  <a class="dropdown-item" href="#">Sedekah Makanan Gratis untuk Desa A</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </div>
              <div class="dropdown dropdown-cat mr-2">
                <button class="btn btn-green font-weight-normal p-3 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Pilih Ziwaf
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdowncat">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </div>
            </div>
            <div class="custom-search">
              <input type="search" class="input-search w-100" name="search" placeholder="Cari">
              <button class="btn btn-search btn-green">
                <ion-icon name="search-outline"></ion-icon>
              </button>
            </div>
          </div>
        </section>
        <section class="col-12 sec-todonation">
          <div class="row px-2">
            <a href="" class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
            <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
              <div class="card-simple">
                <h6 class="clr-green text-sm">Anonim</h6>
                <p class="text-xs mb-2 font-medium">Berdonasi sebesar Rp 50.000</p>
                <span class="text-xxs">7 menit yang lalu</span>
              </div>
            </a>
          </div>
          <div class="d-flex mt-4 justify-content-center">
            <ul class="pagination mb-0">
              <li class="page-item"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection