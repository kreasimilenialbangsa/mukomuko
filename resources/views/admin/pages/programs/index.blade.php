@extends('admin.layouts.app')
@section('title')
    Programs 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Programs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.programs.create')}}" class="btn btn-primary form-btn">Program <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.programs.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

