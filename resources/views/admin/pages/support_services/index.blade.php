@extends('admin.layouts.app')
@section('title')
    Permohonan Dana 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Permohonan Dana</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Permohonan Dana</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.service.dana.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Pengajuan Dana</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.support_services.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

