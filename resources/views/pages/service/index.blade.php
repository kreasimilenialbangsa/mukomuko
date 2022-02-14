@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="rekening-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Layanan</span> / <span class="current">{{ $service->title }}</span>
      </div>
      <div class="row">
        <section class="col-12">
          <div class="wrapper-boxtext">
            <h1 class="box-title">{{ $service->title }}</h1>
            {!! $service->description !!}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection