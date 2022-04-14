@extends('admin.layouts.app')
@section('title')
    Kategori Bantuan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Kategori Bantuan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kategori Bantuan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.category.bantuan.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Kategori Bantuan</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.support_service_categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

