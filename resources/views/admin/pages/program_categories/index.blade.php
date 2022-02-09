@extends('admin.layouts.app')
@section('title')
    Program Categories 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Program Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.category.program.create')}}" class="btn btn-primary form-btn">Program Category <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.program_categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

