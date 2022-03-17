@extends('admin.layouts.app')
@section('title')
    Edit Berita 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <div>
                    <h1>Edit Berita</h1>
                    <div class="section-header-breadcrumb mt-2">
                        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Berita</a></div>
                        <div class="breadcrumb-item">Edit Berita</div>
                    </div>
                </div>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.news.index') }}"  class="btn btn-primary">Kembali</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         {{-- <div class="card">
                             <div class="card-body "> --}}
                                    {!! Form::model($news, ['route' => ['admin.news.update', $news->id], 'method' => 'patch', 'files' => true]) !!}
                                        <div class="row">
                                            @include('admin.pages.news.fields')
                                        </div>

                                    {!! Form::close() !!}
                            {{-- </div>
                         </div> --}}
                    </div>
                 </div>
              </div>
   </div>
  </section>
@endsection
