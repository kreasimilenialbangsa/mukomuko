@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="donatur-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span class="current">Donatur</span>
      </div>
      <div class="row">
        <section class="col-12 mb-4 sec-filter">
          <h4 class="text-center">Donatur</h4>
          <form class="d-center mt-5 justify-content-between">
            <div class="group-select d-flex">
              <div class="btn btn-green mr-2">
                <select class="form-control select-cat">
                  <option selected>Pilih Kecamatan</option>
                  @foreach($kecamatan as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="btn btn-green mr-2">
                <select class="form-control select-cat">
                  <option selected>Pilih Program</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="btn btn-green mr-2">
                <select class="form-control select-cat">
                  <option selected>Pilih Ziwaf</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <!-- <div class="dropdown dropdown-cat mr-2">
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
              </div> -->
            </div>
            <div class="custom-search">
              <input type="search" class="input-search w-100" name="search" placeholder="Cari">
              <button class="btn btn-search btn-green">
                <ion-icon name="search-outline"></ion-icon>
              </button>
            </div>
          </form>
        </section>
        <section class="col-12 sec-todonation">
          <div class="row px-2">
            @forelse($donates as $donate)
              <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
                <div class="card-simple">
                  <h6 class="clr-green text-sm">{{ $donate->is_anonim == 1 ? 'Anonim' : $donate->name }}</h6>
                  <p class="text-xs mb-2 font-medium">Berdonasi sebesar {{ "Rp " . number_format($donate->total_donate,0,",",".") }}</p>
                  <span class="text-xxs">{{ \Carbon\Carbon::parse($donate->created_at)->diffForHumans() }}</span>
                </div>
              </a>
              @empty
              <div class="empty-state w-100">
                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                <h3 class="mt-5 pt-4 font-semibold">Data Not Found</h3>
                <p class="text-base font-medium">Sorry, the data you were looking for could not be found</p>
              </div>
            @endforelse
          </div>
          <div class="d-flex mt-4 justify-content-center">
            {{ $donates->links('vendor.pagination.bootstrap-4') }}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection