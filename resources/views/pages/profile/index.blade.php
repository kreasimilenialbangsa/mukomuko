@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="editprofile-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('layouts.sidebar-profile')
        </div>
        <div class="col-md-9">
          <div class="box-white edit-profile">
            <h5>Edit Profil</h5>
            <form>
              <div class="text-center mb-4">
                <div class="edit-avatar">
                  <input type="file" class="file-input" name="file_avatar">
                  <!-- if theres not img profile -->
                  <ion-icon name="person-sharp"></ion-icon>
                  <!-- if theres img profile -->
                  <!-- <img src="" class="w-100 h-100" alt=""> -->
                  <img class="ic-camera" width="40" height="40" src="{{ asset('img/camera.svg') }}" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-semibold" for="name">Nama</label>
                    <input type="name" placeholder="Nama" required class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label class="font-semibold" for="phone-number">No. Handphone</label>
                    <input type="number" placeholder="No. Handphone" required class="form-control" name="phone_number">
                  </div>
                  <div class="form-group">
                    <label class="font-semibold" for="address">Alamat</label>
                    <input type="text" placeholder="Alamat" required class="form-control" name="address">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-semibold" for="email">Email</label>
                    <input type="text" placeholder="Email" required class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label class="font-semibold" for="date-birth">Tanggal Lahir</label>
                    <input type="date" placeholder="Tanggal Lahir" required class="form-control" name="date_birth">
                  </div>
                  <div class="form-group">
                    <label class="font-semibold" for="bio">Bio Singkat</label>
                    <input type="text" placeholder="Bio Singkat" class="form-control" name="bio">
                  </div>
                </div>
              </div>
              <div class="wrap-button mt-3">
                <button type="submit" class="w-100 btn btn-green py-2">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection