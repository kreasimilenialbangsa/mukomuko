@extends('admin.layouts.app')
@section('title')
    Ziswaf Categories 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ziswaf Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.category.ziswaf.create')}}" class="btn btn-primary form-btn">Ziswaf Category <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.ziswaf_categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

