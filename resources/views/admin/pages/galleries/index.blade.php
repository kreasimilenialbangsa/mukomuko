@extends('admin.layouts.app')
@section('title')
    Galeri
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Galeri</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Galeri</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.galleries.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Galeri</a>
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

