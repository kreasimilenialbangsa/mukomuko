@extends('admin.layouts.app')
@section('title')
    Donasi Ziswaf
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Donasi Ziswaf</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Donasi Ziswaf</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.donatur.program.create')}}" class="btn btn-primary form-btn">Donate <i class="fas fa-plus"></i></a> --}}
            </div>
        </div>
    <div class="section-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="zakat-tab" data-toggle="tab" href="#zakat" role="tab" aria-controls="zakat" aria-selected="true">Zakat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="infaq-tab" data-toggle="tab" href="#infaq" role="tab" aria-controls="infaq" aria-selected="false">Infaq</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="wakaf" aria-selected="false">Wakaf</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shadaqah-tab" data-toggle="tab" href="#shadaqah" role="tab" aria-controls="shadaqah" aria-selected="false">Shadaqah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Donasi</a>
            </li>
        </ul>
       <div class="card border border-top-0">
            <div class="card-body">
                <div class="tab-content" id="myTab3Content">
                    <div class="tab-pane fade show active" id="zakat" role="tabpanel" aria-labelledby="zakat-tab2">
                        @include('admin.pages.ziswaf_donates.table_zakat')
                    </div>
                    <div class="tab-pane fade" id="infaq" role="tabpanel" aria-labelledby="infaq-tab2">
                        @include('admin.pages.ziswaf_donates.table_infaq')
                    </div>
                    <div class="tab-pane fade" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab2">
                        @include('admin.pages.ziswaf_donates.table_wakaf')
                    </div>
                    <div class="tab-pane fade" id="shadaqah" role="tabpanel" aria-labelledby="shadaqah-tab2">
                        @include('admin.pages.ziswaf_donates.table_shadaqah')
                    </div>
                    <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab2">
                        Riwayat
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

