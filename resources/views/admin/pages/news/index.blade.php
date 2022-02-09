@extends('admin.layouts.app')
@section('title')
    News 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>News</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.news.create')}}" class="btn btn-primary form-btn">News <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.news.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

