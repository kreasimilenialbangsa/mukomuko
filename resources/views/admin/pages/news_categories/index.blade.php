@extends('admin.layouts.app')
@section('title')
    News Categories 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>News Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.category.news.create')}}" class="btn btn-primary form-btn">News Category <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.news_categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

