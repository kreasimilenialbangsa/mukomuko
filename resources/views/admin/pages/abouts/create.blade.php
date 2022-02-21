@extends('admin.layouts.app')
@section('title')
    Tambah Tentang 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tentang</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.abouts.index') }}">Tentang</a></div>
                    <div class="breadcrumb-item">Tambah Tentang</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.abouts.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'admin.abouts.store']) !!}
                                    <div class="row">
                                        @include('admin.pages.abouts.fields')
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
