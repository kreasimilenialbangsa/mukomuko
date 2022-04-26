@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="program-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span class="current">Program</span>
      </div>
      <div class="row">
        <section class="col-12 mb-3 mt-2 sec-filter">
          <div class="d-center justify-content-between">
            <div class="title-filter">
               <h4>Program</h4>
               <p class="text-base font-medium mb-0">Menampilkan {{ count($programs) }} dari {{ $programs->total() }} Campaign</p>
            </div>
            <div class="group-select">
              <form class="d-flex" action="{{ route('program.index') }}" method="GET">
              <div class="btn btn-green mr-2">
                <select class="form-control select-cat" name="category">
                  <option selected>Pilih Kategori</option>
                  @foreach($categories as $row)
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
              </form>
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
            @forelse($programs as $key => $program)
              <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-3">
                <div class="card-thumbnail">
                  <a href="{{ route('program.detail', $program->slug) }}">
                  <div class="thumb-pict">
                    <img class="w-100" src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}">
                  </div>
                  <div class="card-detail">
                    <div class="wrap-tags mb-2">
                      @if($program->is_urgent == 1)
                        <span class="tag-cat urgent">Darurat</span>
                      @endif
                      <span class="tag-cat">{{ $program->category->name }}</span>
                    </div>
                    <h6 class="card-title"> 
                      @if(strlen($program->title) > 100)
                        {!! substr($program->title, 0, 100) . '...' !!}
                      @else
                        {!! $program->title !!}
                      @endif
                    </h6>
                    <p class="text-xs mb-1 font-medium">{{ $program->location }}</p>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: {{ $program->donate_sum_total_donate/$program->target_dana*100 }}%" aria-valuenow="{{ $program->donate_sum_total_donate/$program->target_dana*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex mt-2 justify-content-between">
                      <div class="w-left mr-2">
                        <span class="text-xs clr-grey">Terkumpul</span>
                        <h6 class="text-sm">{{ "Rp " . number_format($program->donate_sum_total_donate,0,",",".") }}</h6>
                      </div>
                      <div class="w-right text-right">
                        <span class="text-xs clr-grey">Sisa Hari</span>
                        <h6 class="text-sm">{{ $program->count_day }}</h6>
                      </div>
                    </div>
                    @if($program->count_day > 0)
                      <a href="{{ route('program.detail', $program->slug) }}" class="mt-2 py-2 btn btn-green w-100">Ikut Donasi</a>
                    @else
                      <button class="mt-2 py-2 btn btn-green w-100" disabled>Ikut Donasi</button>
                    @endif
                  </div>
                </a>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                <h4 class="mt-4 font-semibold">Data Not Found</h4>
                <p class="font-medium">Sorry, the data you were looking for could not be found</p>
              </div>
            @endforelse
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
    $(document).ready(function() {
      $('select[name=category]').on('change', function() {
        $(this).closest('form').submit();
      })
    });
  </script>
@endsection