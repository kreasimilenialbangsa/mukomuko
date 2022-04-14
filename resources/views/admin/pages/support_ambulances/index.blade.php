@extends('admin.layouts.app')
@section('title')
    Layanan Ambulan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Layanan Ambulan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Layanan Ambulan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.service.ambulan.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Pengajuan Ambulan</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.support_ambulances.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

