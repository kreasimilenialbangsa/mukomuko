@extends('admin.layouts.app')
@section('title')
    Edit Pengajuan Dana
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <div>
                    <h1>Edit Pengajuan Dana</h1>
                    <div class="section-header-breadcrumb mt-2">
                        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('admin.category.bantuan.index') }}">Layanan dana</a></div>
                        <div class="breadcrumb-item">Edit Pengajuan Dana</div>
                    </div>
                </div>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.category.bantuan.index') }}" class="btn btn-primary">Kembali</a>
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
                                    {!! Form::model($supportServiceCategory, ['route' => ['admin.category.bantuan.update', $supportServiceCategory->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.support_service_categories.fields')
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
