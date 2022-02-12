@extends('admin.layouts.app')
@section('title')
    Kecamatans 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kecamatan</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.location.kecamatan.create')}}" class="btn btn-primary form-btn">Kecamatan <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
        @include('flash::message')
       <div class="card">
            <div class="card-body">
                @include('admin.pages.kecamatans.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

