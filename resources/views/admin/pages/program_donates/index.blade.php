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
                <a class="nav-link active" id="form-tab2" data-toggle="tab" href="#form2" role="tab" aria-controls="form" aria-selected="true">Program Berjalan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab2" data-toggle="tab" href="#images2" role="tab" aria-controls="images" aria-selected="false">Riwayat Donasi</a>
            </li>
        </ul>
       <div class="card border border-top-0">
            <div class="card-body">
                <div class="tab-content" id="myTab3Content">
                    <div class="tab-pane fade show active" id="form2" role="tabpanel" aria-labelledby="form-tab2">
                        @include('admin.pages.program_donates.table')
                    </div>
                    <div class="tab-pane fade" id="images2" role="tabpanel" aria-labelledby="images-tab2">
                        Riwayat
                    </div>
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

