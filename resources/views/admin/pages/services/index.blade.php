@extends('admin.layouts.app')
@section('title')
    Layanan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Layanan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Layanan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.services.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Layanan</a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.services.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

