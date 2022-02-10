@extends('admin.layouts.app')
@section('title')
    Abouts 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Abouts</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.abouts.create')}}" class="btn btn-primary form-btn">About <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.abouts.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

