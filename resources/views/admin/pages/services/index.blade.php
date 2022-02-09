@extends('admin.layouts.app')
@section('title')
    Services 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Services</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.services.create')}}" class="btn btn-primary form-btn">Service <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.services.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

