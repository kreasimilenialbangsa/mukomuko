@extends('admin.layouts.app')
@section('title')
    Edit Donasi 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Edit Donasi Ziswaf</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.donatur.ziswaf.index') }}">Donasi Ziswaf</a></div>
                    <div class="breadcrumb-item">Edit Donasi Ziswaf</div>
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
                                {!! Form::model($donate, ['route' => ['admin.donatur.ziswaf.update', $donate->id], 'method' => 'patch', 'class' => 'form-save']) !!}
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

