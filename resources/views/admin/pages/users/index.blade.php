@extends('admin.layouts.app')
@section('title')
    {{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }} 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>{{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }}</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">{{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }}</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.account.'.request()->segment(3).'.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Akun</a>
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

