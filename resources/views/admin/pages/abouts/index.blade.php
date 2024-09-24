@extends('admin.layouts.app')
@section('title')
    Tentang
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tentang</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Tentang</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.abouts.create')}}" class="btn btn-primary form-btn">Tentang <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            {{--  --}}
           <div class="card">
                <div class="card-body">
                @include('admin.pages.abouts.table')
            </div>
       </div>
   </div>

    </section>
@endsection

