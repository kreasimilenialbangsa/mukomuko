@extends('admin.layouts.app')
@section('title')
    Ziswafs
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ziswaf</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.ziswafs.create')}}" class="btn btn-primary form-btn">Ziswaf <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.ziswafs.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

