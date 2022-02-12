<header class="main-header fixed-top">
  <nav class="navbar p-0 navbar-expand-lg">
    <a class="navbar-brand mr-0" href="/view/home">
      <img class="logo-header" src="{{ asset('img/logo-nu.png') }}" alt="">
    </a>
    <button 
      type="button" 
      class="btn btn-hamburger p-0 d-lg-none d-block"
      data-toggle="collapse" 
      data-target="#navbarNav" 
      aria-controls="navbarNav" 
      aria-expanded="false" 
      aria-label="Toggle navigation">
      <div class="hamburger">
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto pt-lg-0 pt-3">
        <li class="nav-item active">
          <a class="nav-link" href="/view/ziswaf">Ziswaf</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/view/program">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/view/berita">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/view/donatur">Donatur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/view/galeri">Galeri</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/view/layanan/daftar-rekening" role="button" data-toggle="dropdown" aria-expanded="false">
            Layanan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/view/layanan/daftar-rekening">Daftar Rekening</a>
            <a class="dropdown-item" href="/view/layanan/go-ziswaf">Go-Ziswaf</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/view/tentang/sekilas-nu" role="button" data-toggle="dropdown" aria-expanded="false">
            Tentang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/view/tentang/sekilas-nu">Sekilas NU</a>
            <a class="dropdown-item" href="/view/tentang/visi-misi">Visi & Misi</a>
            <a class="dropdown-item" href="/view/tentang/pengurus">Pengurus</a>
          </div>
        </li>
        <li class="nav-actions py-3 d-lg-none d-block">
          <button class="btn px-3 btn-outline-green mr-2">Masuk</button>
          <button class="btn px-3 btn-green">Daftar</button>
        </li>
      </ul>
    </div>
    <div class="nav-actions d-lg-block d-none">
      <button class="btn px-3 btn-outline-green mr-2">Masuk</button>
      <button class="btn px-3 btn-green">Daftar</button>
    </div>
  </nav>
</header>