@extends('admin.layouts.app')
@section('title')
    Ziswaf Category Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Ziswaf Category Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.ziswafCategories.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
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
           <div class="card">
            <div class="card-body">
                    @include('admin.pages.ziswaf_categories.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
