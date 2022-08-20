@extends('admin.layouts.app')
@section('title')
    Donasi Program 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Donasi Program</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Donasi Program</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.donatur.program.create')}}" class="btn btn-primary form-btn">Donate <i class="fas fa-plus"></i></a> --}}
            </div>
        </div>
    <div class="section-body">
        @include('flash::message')
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="form-tab2" data-toggle="tab" href="#list" role="tab" aria-controls="form" aria-selected="true">Program Berjalan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab2" data-toggle="tab" href="#history" role="tab" aria-controls="images" aria-selected="false">Riwayat Donasi</a>
            </li>
        </ul>
       <div class="card border border-top-0">
            <div class="card-body">
                <div class="tab-content" id="myTab3Content">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="form-tab2">
                        @include('admin.pages.program_donates.table')
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="images-tab2">
                        <div class="row">
                            @forelse ($donateHistory as $history)
                            <a class="col-lg-3 col-md-4 col-6 wblock">
                                <div class="card border">
                                    <div class="card-body">
                                        <h6 class="clr-green text-sm">{{ $history->is_anonim == 1 ? 'Hamba Allah' : $history->name }}</h6>
                                        <p class="text-xs mb-2 font-medium">Berdonasi sebesar {{ "Rp " . number_format($history->total_donate,0,",",".") }}</p>
                                        <span class="text-xxs">{{ \Carbon\Carbon::parse($history->date_donate)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="empty-state">
                                <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                                <h4 class="mt-4 font-semibold">Data Tidak Ditemukan</h4>
                                <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
                            </div>
                            @endforelse
                        </div>
                        <div class="d-flex mt-4 justify-content-center">
                            {{ $donateHistory->links('vendor.pagination.bootstrap-4') }}
                          </div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

@push('script')
    <script>
        $(function(){
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function (e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        });
    </script>
@endpush

