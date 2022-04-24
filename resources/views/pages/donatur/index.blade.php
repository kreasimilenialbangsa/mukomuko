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
          <form class="d-center mt-md-5 mt-4 row justify-content-md-between">
            <div class="col-md-6 col-12">
              <div class="group-select row">
                {{-- <div class="btn btn-green ml-3 col-md-3 col">
                  <select class="form-control select-cat">
                    <option selected>Pilih Kecamatan</option>
                    @foreach($kecamatan as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="btn btn-green mx-2 col-md-3 col">
                  <select class="form-control select-cat">
                    <option selected>Pilih Program</option>
                    @foreach($programs as $row)
                      <option value="{{ $row->id }}">{{ $row->title }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="btn btn-green mr-3 col-md-3 col">
                  <select class="form-control select-cat">
                    <option selected>Pilih Ziwaf</option>
                    @foreach($ziswaf as $row)
                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                  @endforeach
                  </select>
                </div>--}}
                <div class="btn btn-green mx-3 col-md-3 col">
                  <select class="form-control select-cat">
                    <option selected>Terbaru</option>
                    <option value="latest">Terlama</option>
                  </select>
                </div>
              </div>
            </div>
            {{-- <div class="col-md-4 col-lg-3 col-12 mt-3">
              <div class="custom-search">
                <input type="search" class="input-search w-100" name="search" placeholder="Cari">
                <button class="btn btn-search btn-green">
                  <ion-icon name="search-outline"></ion-icon>
                </button>
              </div>
            </div> --}}
          </form>
        </section>
        <section class="col-12 sec-todonation">
          <div class="row px-2">
            @forelse($donates as $donate)
              <a class="col-lg-3 col-md-4 col-6 p-2 wblock">
                <div class="card-simple">
                  <h6 class="clr-green text-sm">{{ $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name }}</h6>
                  <p class="text-xs mb-2 font-medium">Berdonasi sebesar {{ "Rp " . number_format($donate->total_donate,0,",",".") }}</p>
                  <span class="text-xxs">{{ \Carbon\Carbon::parse($donate->created_at)->diffForHumans() }}</span>
                </div>
              </a>
              @empty
              <div class="empty-state">
                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                <h4 class="mt-4 font-semibold">Data Not Found</h4>
                <p class="font-medium">Sorry, the data you were looking for could not be found</p>
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
  <script>
    $(document).ready(function() {
      $('select[name=category]').on('change', function() {
        $(this).closest('form').submit();
      })
    });
  </script>
@endsection