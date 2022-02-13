@extends('admin.layouts.app')
@section('title')
    Desas 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Desas</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.location.desa.create')}}" class="btn btn-primary form-btn">Desa <i class="fas fa-plus"></i></a>
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

