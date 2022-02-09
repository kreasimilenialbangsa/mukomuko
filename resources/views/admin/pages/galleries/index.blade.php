@extends('admin.layouts.app')
@section('title')
    Galleries 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Galleries</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.galleries.create')}}" class="btn btn-primary form-btn">Gallery <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.galleries.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

