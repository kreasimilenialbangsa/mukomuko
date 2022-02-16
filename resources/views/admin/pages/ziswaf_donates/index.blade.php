@extends('admin.layouts.app')
@section('title')
    Donasi Ziswaf
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Donasi Ziswaf</h1>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.donatur.program.create')}}" class="btn btn-primary form-btn">Donate <i class="fas fa-plus"></i></a> --}}
            </div>
        </div>
    <div class="section-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="zakat-tab2" data-toggle="tab" href="#zakat" role="tab" aria-controls="zakat" aria-selected="true">Zakat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="infaq-tab2" data-toggle="tab" href="#infaq2" role="tab" aria-controls="infaq" aria-selected="false">Infaq</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="wakaf-tab2" data-toggle="tab" href="#wakaf2" role="tab" aria-controls="wakaf" aria-selected="false">Wakaf</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shadaqah-tab2" data-toggle="tab" href="#shadaqah2" role="tab" aria-controls="shadaqah" aria-selected="false">Shadaqah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="riwayat-tab2" data-toggle="tab" href="#riwayat2" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Donasi</a>
            </li>
        </ul>
       <div class="card border border-top-0">
            <div class="card-body">
                <div class="tab-content" id="myTab3Content">
                    <div class="tab-pane fade show active" id="zakat" role="tabpanel" aria-labelledby="zakat-tab2">
                        @include('admin.pages.ziswaf_donates.table')
                    </div>
                    <div class="tab-pane fade" id="infaq2" role="tabpanel" aria-labelledby="infaq-tab2">
                        Infaq
                    </div>
                    <div class="tab-pane fade" id="wakaf2" role="tabpanel" aria-labelledby="wakaf-tab2">
                        Wakaf
                    </div>
                    <div class="tab-pane fade" id="shadaqah2" role="tabpanel" aria-labelledby="shadaqah-tab2">
                        Shadaqah
                    </div>
                    <div class="tab-pane fade" id="riwayat2" role="tabpanel" aria-labelledby="riwayat-tab2">
                        Riwayat
                    </div>
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

