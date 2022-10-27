@extends('admin.layouts.app')
@section('title')
    Notifikasi 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Notifikasi</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Notifikasi</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.notifications.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Notifikasi</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.notifications.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

