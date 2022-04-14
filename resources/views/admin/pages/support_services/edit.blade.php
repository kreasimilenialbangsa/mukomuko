@extends('layouts.app')
@section('title')
    Edit Pengajuan Dana
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <div>
                    <h1>Pengajuan Dana</h1>
                    <div class="section-header-breadcrumb mt-2">
                        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('admin.service.dana.index') }}">Permohonan Dana</a></div>
                        <div class="breadcrumb-item">Edit Pengajuan Dana</div>
                    </div>
                </div>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.service.dana.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($supportService, ['route' => ['admin.service.dana.update', $supportService->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.support_services.fields')
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
