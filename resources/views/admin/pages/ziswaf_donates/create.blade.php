@extends('admin.layouts.app')
@section('title')
    Tambah Donasi 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">New Donasi</h3>
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
                                {!! Form::open(['route' => ['admin.donatur.ziswaf.storage', Request::segment(4)]]) !!}
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
