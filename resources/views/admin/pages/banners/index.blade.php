@extends('admin.layouts.app')
@section('title')
    Banner
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Banner</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Banner</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.banners.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Banner</a>
            </div>
        </div>
    <div class="section-body">

       <div class="card">
            <div class="card-body">
                @include('admin.pages.banners.table')
            </div>
       </div>
   </div>

    </section>
@endsection

