@extends('layouts.app')

@section('title')
  Pendaftaran Anggota
@endsection

@section('meta')
  <meta name="title" content="Pendaftaran Anggota - NU CARE">
  <meta name="description" content="Pendaftaran Anggota LazisNu Mokumuko">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="Pendaftaran Anggota - NU CARE">
  <meta property="og:description" content="Pendaftaran Anggota LazisNu Mokumuko">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="Pendaftaran Anggota - NU CARE">
  <meta property="twitter:description" content="Pendaftaran Anggota LazisNu Mokumuko">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
<!-- select2 css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
<style>
    .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
        line-height: calc(2em + 0.35rem);
    }

    .form-control {
        border: 1px solid #45BF7C !important;
    }
</style>
@endsection

@section('content')
  <div class="rekening-page">
    <div class="container">
      <div class="cus-breadcrumb">
        <span>Beranda</span> / <span>Layanan</span> / <span class="current">Pendaftaran Anggota</span>
      </div>
      <div class="row">
        <section class="col-12">
          <div class="wrapper-boxtext px-3">
            <div class="text-center mb-5">
                <h3>Pendaftaran Anggota</h3>
                <h4>{{ @Request::get('type') == 'kecamatan' ? 'Kecamatan' : 'Desa' }}</h4>
            </div>

            {!! Form::open(['route' => 'register.store']) !!}
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('location', (@Request::get('type') == 'kecamatan' ? 'Kecamatan*' : 'Desa*')) !!}
                            {!! Form::select('location', @$locations, null, ['class' => 'form-control select2']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('name', 'Nama*') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>
    
                        <div class="form-group col-md-6">
                            {!! Form::label('email', 'Email*') !!}
                            <div class="input-group mb-3">
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">@lazisnumukomuko.id</span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-4">
                            {!! Form::label('telp', 'No. HP*') !!}
                            {!! Form::number('telp', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>

                        <div class="form-group col-md-4">
                            {!! Form::label('nik', 'NIK') !!}
                            {!! Form::number('nik', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>
    
                        <div class="form-group col-md-4">
                            {!! Form::label('kk', 'KK') !!}
                            {!! Form::number('kk', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('birth_place', 'Tempat Lahir') !!}
                            {!! Form::number('birth_place', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>
    
                        <div class="form-group col-md-6">
                            {!! Form::label('birth_day', 'Tanggal Lahir') !!}
                            {!! Form::date('birth_day', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('address', 'Alamat') !!}
                            {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Ketik disini']) !!}
                        </div>  

                        <div class="col-md-12 mt-3">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <!-- Select2 JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2({
          theme: 'bootstrap4'
      });
    });
  </script>
@endsection