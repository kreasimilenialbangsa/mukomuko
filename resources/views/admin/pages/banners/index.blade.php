@extends('admin.layouts.app')
@section('title')
    Banners 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Banners</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.banners.create')}}" class="btn btn-primary form-btn">Banner <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
        @include('flash::message')
       <div class="card">
            <div class="card-body">
                @include('admin.pages.banners.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

