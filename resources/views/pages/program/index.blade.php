@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="program-page">
    <div class="container">
      <div class="row">
        <section class="col-12 mb-3 mt-2 sec-filter">
          <div class="d-center justify-content-between">
            <div class="title-filter">
               <h4>Program</h4>
               <p class="text-base font-medium mb-0">Menampilkan {{ count($programs) }} dari {{ $programs->total() }} Campaign</p>
            </div>
            <div class="group-select">
              <div class="btn btn-green mr-2">
                <select class="form-control select-cat">
                  <option selected>Pilih Kecamatan</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <!-- <div class="dropdown dropdown-cat">
              <button class="btn btn-green font-weight-normal p-3 dropdown-toggle" type="button" id="dropdowncat" data-toggle="dropdown" aria-expanded="false">
                Pilih Kategori
              </button>
              <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdowncat">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
              </div>
            </div> -->
          </div>
        </section>
        <section class="col-12 sec-aydonation">
          <div class="row">
            @foreach($programs as $key => $program)
              <div class="col-lg-3 col-md-4 col-6 p-3">
                <div class="card-thumbnail">
                  <div class="thumb-pict">
                    <img class="w-100" src="{{ asset('img/dummy-1.jpg') }}" alt="">
                    <span class="tag-cat">{{ $program->category->name }}</span>
                  </div>
                  <div class="card-detail">
                    <h6>{{ $program->title }}</h6>
                    <p class="text-xs mb-1 font-medium">{{ $program->location }}</p>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex mt-2 justify-content-between">
                      <div class="w-left mr-2">
                        <span class="text-xs clr-grey">Terkumpul</span>
                        <h6 class="text-sm">RP 3.500.000</h6>
                      </div>
                      <div class="w-right text-right">
                        <span class="text-xs clr-grey">Sisa Hari</span>
                        <h6 class="text-sm">{{ $program->count_day }}</h6>
                      </div>
                    </div>
                    <a href="{{ route('program.detail', $program->slug) }}" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="d-flex mt-3 justify-content-center">
            {{ $programs->links('vendor.pagination.bootstrap-4') }}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection