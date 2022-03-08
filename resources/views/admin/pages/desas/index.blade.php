@extends('admin.layouts.app')
@section('title')
    Desa 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Desa</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Desa</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.location.desa.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Desa</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            @include('flash::message')
            <div class="card-body">
                @include('admin.pages.desas.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

