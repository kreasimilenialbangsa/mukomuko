<!-- Modal Masuk/Daftar -->
<div class="modal modal-auth fade" id="authmodal" tabindex="-1" role="dialog" aria-labelledby="authmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Masuk</a>
          </li>
          <li class="nav-item">
            <a lass="nav-link" id="sigin-tab" data-toggle="tab" href="#sigin" role="tab" aria-controls="sigin" aria-selected="false">Daftar</a>
          </li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="pills-tabContent">
          <div  class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form action="">
              <h4 class="mb-3">Masuk</h4>
              <div class="form-group">
                <label class="font-semibold" for="email">Alamat Surel</label>
                <input type="email" placeholder="Alamat Surel" required class="form-control" name="email">
              </div>
              <div class="form-group">
                <label class="font-semibold" for="password">Kata Sandi</label>
                <input type="password" placeholder="Kata Sandi" required class="form-control" name="email">
                <span class="text-xs">Lupa Password?</span>
              </div>
              <div class="form-group mb-0">
                <button class="btn py-2 btn-green w-100">Masuk</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="sigin" role="tabpanel" aria-labelledby="sigin-tab">
            <form action="">
              <h4 class="mb-3">Daftar</h4>
              <div class="form-group">
                <label class="font-semibold" for="name">Nama</label>
                <input type="text" required class="form-control" name="name">
              </div>
              <div class="form-group">
                <label class="font-semibold" for="phone">Nomor Telepon</label>
                <input type="number" placeholder="Nomor Telepon" required class="form-control" name="phone">
              </div>
              <div class="form-group">
                <label class="font-semibold" for="email">Alamat Surel</label>
                <input type="email" placeholder="Alamat Surel" required class="form-control" name="email">
              </div>
              <div class="form-group">
                <label class="font-semibold" for="password">Kata Sandi</label>
                <input type="password" placeholder="Kata Sandi" required class="form-control" name="password">
              </div>
              <div class="form-group">
                <label class="font-semibold" for="re-password">Konfirmasi Kata Sandi</label>
                <input type="password" placeholder="Konfirmasi Kata Sandi" required class="form-control" name="re-password">
              </div>
              <div class="form-group mb-0">
                <button class="btn py-2 btn-green w-100">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer pt-0">
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
      </div>
    </div>
  </div>
</div>