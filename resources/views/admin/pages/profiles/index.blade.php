@extends('admin.layouts.app')
@section('title')
    Profile 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Profile</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['admin.profile.update'], 'method' => 'post', 'files' => true]) !!}
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
              <div class="card profile-widget">
                <div class="profile-widget-header">
                  {{-- <img alt="image" src="{{ isset($user->profile->image) ? asset($user->profile->image) : asset('web/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture"> --}}
                    <div class="profile-widget-picture">
                        <div class="image-area">
                            <div class="image-profile" id="uploaded_image" style="background-image: url({{ isset($user->profile->image) ? asset('storage/'.$user->profile->image) : asset('web/img/avatar/avatar-1.png') }});"></div>
                            <div class="overlay">
                                <div class="text"><i class="fas fa-camera"></i></div>
                            </div>
                            <input type="file" name="image" id="upload_image" accept=".jpeg, .jpg, .png" >
                        </div>
                    </div>
                  <div class="profile-widget-items">
                    {{-- <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Posts</div>
                      <div class="profile-widget-item-value">187</div>
                    </div>
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Followers</div>
                      <div class="profile-widget-item-value">6,8K</div>
                    </div>
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Following</div>
                      <div class="profile-widget-item-value">2,1K</div>
                    </div> --}}
                  </div>
                </div>
                <div class="profile-widget-description">
                  <div class="profile-widget-name">{{ $user->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $user->role_user->role->name }}</div></div>
                  {{ $user->profile->bio }}
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
              <div class="card">
                <form method="post" class="needs-validation" novalidate="" autocomplete="off">
                  <div class="card-header">
                    <h4>Edit Profile</h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Nama</label>
                          {!! Form::text('name', @$user->name, ['class' => 'form-control']) !!}
                          <div class="invalid-feedback">
                            Please fill in the first name
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            {!! Form::text(null, @$user->email, ['class' => 'form-control', 'disabled']) !!}
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>NIK</label>
                            {!! Form::text('nik', @$user->profile->nik, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>No. KK</label>
                            {!! Form::text('kk', @$user->profile->nik, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>No. HP</label>
                            {!! Form::text('telp', @$user->profile->telp, ['class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Tempat Lahir</label>
                            {!! Form::text('birth_place', @$user->profile->birth_place, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Lahir</label>
                            {!! Form::date('birth_day', @$user->profile->birth_day, ['class' => 'form-control']) !!}
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                            <label>Alamat</label>
                            {!! Form::textarea('address', @$user->profile->address, ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
                        </div>
                        <div class="form-group col-6">
                            <label>Bio</label>
                            {!! Form::textarea('bio', @$user->profile->bio, ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="card-header pl-0 pb-2">
                            <h4>Ganti Password</h4>
                          </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Password</label>
                            {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
                            <span class="text-muted">Minimal 6 karakter</span>
                        </div>
                        <div class="form-group col-6">
                            <label>Konfirmasi Password</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('password') ? $errors->first('password') : ''  }}</span>
                        </div>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
        {!! Form::close() !!}
    
    </section>
@endsection

@push('style')
    <style>
        .image-area {
            position: relative;
            cursor: pointer;
        }

        #upload_image {
            height: 200px;
            cursor: pointer;
            position: absolute;
            top: 0px;
            right: 0px;
            font-size: 100px;
            z-index: 2;

            opacity: 0.0; /* Standard: FF gt 1.5, Opera, Safari */
            filter: alpha(opacity=0); /* IE lt 8 */
            -ms-filter: "alpha(opacity=0)"; /* IE 8 */
            -khtml-opacity: 0.0; /* Safari 1.x */
            -moz-opacity: 0.0; /* FF lt 1.5, Netscape */
        }
        
        .image-profile {
            background-size: cover; 
            background-position: center; 
            height: 100px; 
            width: 100px;
            border-radius: 100px;
        }

        .overlay {
		  position: absolute;
		  bottom: 0px;
		  right: 0;
		  background-color: #45BF7C;
		  height: 30px;
		  width: 30px;
          border-radius: 100px;
		}

        .text {
            color: #fff;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
@endpush

@push('script')
    <script>
    $(document).ready(function() {
        $('#upload_image').change(function(event) {
            var files = event.target.files[0];
            $('#uploaded_image').css('background-image', 'url('+URL.createObjectURL(event.target.files[0])+')');
            $('#uploaded_image').val(files);
        });
    });
    </script>
@endpush

