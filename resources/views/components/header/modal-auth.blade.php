<!-- Modal Masuk/Daftar -->
<div class="modal modal-auth fade" id="authmodal" tabindex="-1" role="dialog" aria-labelledby="authmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-pills text-center w-100" id="pills-tab" role="tablist">
          <li class="nav-item w-50">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Masuk</a>
          </li>
          <li class="nav-item w-50">
            <a class="nav-link" id="sigin-tab" data-toggle="tab" href="#sigin" role="tab" aria-controls="sigin" aria-selected="false">Daftar</a>
          </li>
        </ul>
      </div>
      <div class="modal-body pt-2">
        <div class="tab-content">
          <div  class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form method="POST" action="{{ route('login-user') }}" class="needs-validation" novalidate="">
              @csrf
              <h4 class="mb-3">Masuk</h4>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" required class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" required class="form-control" name="password">
                <a href="{{ route('forgot-password') }}" class="text-xs text-dark">Lupa Password?</a>
              </div>
              <div class="form-group mb-0">
                <button type="submit" class="btn py-2 btn-green w-100">Masuk</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="sigin" role="tabpanel" aria-labelledby="sigin-tab">
            <form method="POST" action="{{ route('register-user') }}" class="needs-validation form-daftar" novalidate="">
              @csrf
              <h4 class="mb-3">Daftar</h4>
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" required placeholder="Nama" class="form-control" name="name" required>
                <div class="invalid-feedback">Nama wajib diisi</div>
              </div>
              <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="number" placeholder="Nomor Telepon" required class="form-control" name="phone" required>
                <div class="invalid-feedback">Nomor Telepon wajib diisi</div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" required class="form-control" name="email" required>
                <div class="invalid-feedback">Email wajib diisi</div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" required class="form-control" name="password" required>
                <div class="invalid-feedback">Password wajib diisi</div>
              </div>
              <div class="form-group">
                <label for="re-password">Konfirmasi Password</label>
                <input type="password" placeholder="Konfirmasi Password" required class="form-control" name="re-password" required>
                <div class="invalid-feedback">Konfirmasi Password wajib diisi</div>
              </div>
              <div class="form-group mb-0">
                <button type="submit" class="btn py-2 btn-green w-100 daftar">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- <div class="modal-footer pt-0">
        <div class="d-center">
          <span class="line-grey"></span>
          atau masuk dengan
          <span class="line-grey"></span>
        </div>
        <div class="other-login mt-3">
          <button class="btn-fb btn">
            <span class="icon">
              <img src="{{ asset('img/ic-fb.svg') }}" alt="">
            </span>
            <span class="w-100">Masuk</span>
          </button>
          <button class="btn-google btn">
            <span class="icon">
              <img src="{{ asset('img/google.svg') }}" alt="">
            </span>
            <span class="w-100">Masuk</span>
          </button>
        </div>
      </div> --}}
    </div>
  </div>
</div>