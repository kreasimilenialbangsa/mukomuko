@extends('admin.layouts.app')
@section('title')
    Tambah Donasi 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tambah Donasi Program</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.donatur.program.index') }}">Donasi Program</a></div>
                    <div class="breadcrumb-item">Tambah Donasi Program</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.donatur.program.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => ['admin.donatur.program.store', Request::segment(4)], 'class' => 'form-save']) !!}
                                    <div class="row">
                                        @include('admin.pages.program_donates.fields')
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
