<footer class="main-footer">
  <div class="container">
  <div class="row wrapper-footer">
    <div class="col-lg-4 pl-0 pr-xl-5 pr-lg-4">
      <img class="logo-footer" src="{{ asset('img/logo-nu.png') }}" alt="">
      <p class="mt-4 d-lg-block d-none">NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko</p>
    </div>
    <div class="col-lg-3">
      <h6 class="d-lg-block d-none">Pelajari Lebih Lanjut</h6>
      <div class="row nav-wrap m-0 mt-3">
        <div class="col-lg-6 col-5 px-0">
          <a class="nav-link" href="#">Tentang Kami</a>
        </div>
        <div class="col-lg-6 col-3 px-0">
          <a class="nav-link" href="#">Sekilas NU</a>
        </div>
        <div class="col-lg-6 col-3 px-0">
          <a class="nav-link" href="#" style="border-right: none">Visi & Misi</a>
        </div>
        <div class="col-lg-6 col-3 px-0">
          <a class="nav-link" href="#">Pengurus</a>
        </div>
        <div class="col-lg-6 col-5 px-0">
          <a class="nav-link" href="#">Daftar Rekening</a>
        </div>
        <div class="col-lg-6 col-3 px-0">
          <a class="nav-link" href="#" style="border-right: none">GO-Ziswaf</a>
        </div>
        <div class="col-lg-6 col-3 px-0">
          <a class="nav-link" href="#" style="border-right: none">Layanan</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 d-lg-block d-none pr-xl-5 pr-lg-4">
      <h6>NU Care Lazisnu Kabupaten Mukomuko</h6>
      <div class="d-flex mt-4">
        <ion-icon class="ic-ion" name="location-sharp"></ion-icon>
        <div class="ml-3">
          <p class="mb-4">Jalan Wijaya Kusuma Desa Marga Mulya Sakti Kecamatan Penarik Kabupaten Mukomuko Provinsi Bengkulu</p>
          <a href="https://www.google.com/search?tbm=lcl&sxsrf=APq-WBtEr3T8Xtf15ryz1dDFvZZneNVCpA:1644894500252&q=NU+Care+Lazisnu+Mukomuko&rflfq=1&num=20&stick=H4sIAAAAAAAAABWMMQrCQBBFSaHYR0RS7RF2ZjIzO7Wtio0HWGRFMRpJSONxPIHn8hSOxYfP5_23mDdLYFCDVhKqmZEZqjQ1awIBJiUFMiVCdFSUJZliiiAYOUJCR8WSuILNNWzivamFiFUggiG7M8F_dBNLm5D80JKa05-q-larQ-mfXQm5G_swljycLuHcD-_Zen8MmzyUsM2v6_iYwm669XfPDxNGIUi5AAAA&ved=2ahUKEwi2qoXD3YD2AhXzSGwGHYqMDpIQjHJ6BAgZEAU&rldimm=15179146827999399276" target="_blank" class="btn btn-outline-green">Lihat Lokasi di Maps</a>
        </div>
      </div>
    </div>
    <div class="col-lg-1 px-0">
      <h6 class="clr-green d-lg-block d-none">Ikuti Kami</h6>
      <div class="d-flex justify-content-lg-start justify-content-center wrap-sosmed mt-lg-4">
        <a href="https://www.facebook.com/nu.mukomuko" target="_blank"class="mr-2">
          <ion-icon class="ic-ion ic-sosmed" name="logo-facebook"></ion-icon>
        </a>
        <a href="" class="mr-2">
          <ion-icon class="ic-ion ic-sosmed" name="logo-instagram"></ion-icon>
        </a>
        <a href="" class="mr-2">
          <ion-icon class="ic-ion ic-sosmed" name="logo-twitter"></ion-icon>
        </a>
        <a href="">
          <ion-icon class="ic-ion ic-sosmed" name="logo-youtube"></ion-icon>
        </a>
      </div>
    </div>
  </div>
  <div class="copyright d-lg-block d-none">
    <p class="mb-0">
      Copyright © 2017-{{ date('Y') }} — NU CARE-LAZISNU MUKOMUKO — All Right Reserved
    </p>
  </div>
  <div class="shortcut-footer d-lg-none d-block">
    <div class="d-flex justify-content-between">
      <a class="wrap-shortcut nav-link" href="{{ route('home') }}">
        <ion-icon class="h4" name="home"></ion-icon>
        <span>Home</span>
      </a>
      <a class="wrap-shortcut nav-link" href="{{ route('program.index') }}">
        <ion-icon class="h4" name="pie-chart"></ion-icon>
        <span>Program</span>
      </a>
      <a class="wrap-shortcut nav-link" href="{{ route('news.index') }}">
        <ion-icon class="h4" name="newspaper"></ion-icon>
        <span>Berita</span>
      </a>
      <a class="wrap-shortcut nav-link" href="{{ route('donatur.index') }}">
        <ion-icon class="h4" name="people"></ion-icon>
        <span>Donatur</span>
      </a>
      <a class="wrap-shortcut nav-link" href="{{ route('login') }}">
        <ion-icon class="h4" name="person-sharp"></ion-icon>
        <span>Akun</span>
      </a>
    </div>
  </div>
</div>
</footer>