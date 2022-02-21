@extends('admin.layouts.app')
@section('title')
    Tambah Donasi 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tambah Donasi Ziswaf</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.donatur.ziswaf.index') }}">Donasi Ziswaf</a></div>
                    <div class="breadcrumb-item">Tambah Donasi Ziswaf</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.donatur.ziswaf.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => ['admin.donatur.ziswaf.store', Request::segment(4)]]) !!}
                                    <div class="row">
                                        @include('admin.pages.ziswaf_donates.fields')
                                    </div>
                                {!! Form::close() !!}
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
