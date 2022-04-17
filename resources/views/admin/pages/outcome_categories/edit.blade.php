@extends('admin.layouts.app')
@section('title')
    Edit Kategori Pengeluaran 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <div>
                    <h1>Edit Kategori Pengeluaran</h1>
                    <div class="section-header-breadcrumb mt-2">
                        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('admin.category.outcome.index') }}">Kategori Pengeluaran</a></div>
                        <div class="breadcrumb-item">Edit Kategori Pengeluaran</div>
                    </div>
                </div>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.category.outcome.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($outcomeCategory, ['route' => ['admin.category.outcome.update', $outcomeCategory->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.outcome_categories.fields')
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
