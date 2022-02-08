<header class="main-header fixed-top">
  <nav class="navbar p-0 navbar-expand-lg">
    <a class="navbar-brand" href="#">
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
          <a class="nav-link" href="#">Ziswaf</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Galery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Layanan</a>
        </li>
        <li class="nav-actions py-3 d-lg-none d-block">
          <button class="btn btn-outline-green mr-2">Masuk</button>
          <button class="btn btn-green">Daftar</button>
        </li>
      </ul>
    </div>
    <div class="nav-actions d-lg-block d-none">
      <button class="btn btn-outline-green mr-2">Masuk</button>
      <button class="btn btn-green">Daftar</button>
    </div>
  </nav>
</header>