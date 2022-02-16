<x-header.notice/>

<header class="main-header">
  <nav class="navbar container p-0 navbar-expand-lg">
    <a class="navbar-brand mr-0" href="{{ route('home') }}">
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
        <li class="nav-item {{ Request::is('ziswaf') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('ziswaf.index') }}">Ziswaf</a>
        </li>
        <li class="nav-item {{ Request::is('program') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('program.index') }}">Program</a>
        </li>
        <li class="nav-item {{ Request::is('berita') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('news.index') }}">Berita</a>
        </li>
        <li class="nav-item {{ Request::is('donatur') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('donatur.index') }}">Donatur</a>
        </li>
        <li class="nav-item {{ Request::is('galeri') ? 'active' : '' }}">
          <a class="nav-link" href="/galeri">Galeri</a>
        </li>
        <li class="nav-item dropdown {{ Request::is('layanan*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Layanan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <x-header.service/>
          </div>
        </li>
        <li class="nav-item dropdown {{ Request::is('tentang*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Tentang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <x-header.about/>
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