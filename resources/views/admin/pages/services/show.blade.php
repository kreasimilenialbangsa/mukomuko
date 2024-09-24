@extends('admin.layouts.app')
@section('title')
    Service Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Service Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.services.index') }}"
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
                    @include('admin.pages.services.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
