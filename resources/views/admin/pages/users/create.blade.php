@extends('admin.layouts.app')
@section('title')
    Tambah Akun Pengguna
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Tambah Akun Pengguna</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.account.'.request()->segment(3).'.index') }}">Akun Pengguna</a></div>
                    <div class="breadcrumb-item">Tambah Akun Pengguna</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.account.'.request()->segment(3).'.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'admin.account.'.request()->segment(3).'.store']) !!}
                                    <div class="row">
                                        @include('admin.pages.users.fields')
                                    </div>
                                {!! Form::close() !!}
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
