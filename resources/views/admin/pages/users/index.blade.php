@extends('admin.layouts.app')
@section('title')
    Akun Pengguna 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Akun Pengguna</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Akun Pengguna</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.users.create')}}" class="btn btn-primary form-btn">User <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
            @include('flash::message')
           <div class="card">
                <div class="card-body">
                @include('admin.pages.users.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

