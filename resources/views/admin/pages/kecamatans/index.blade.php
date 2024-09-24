@extends('admin.layouts.app')
@section('title')
    Kecamatan
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Kecamatan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kecamatan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.location.kecamatan.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Kecamatan</a>
            </div>
        </div>
    <div class="section-body">

       <div class="card">
            <div class="card-body">
                @include('admin.pages.kecamatans.table')
            </div>
       </div>
   </div>

    </section>
@endsection

