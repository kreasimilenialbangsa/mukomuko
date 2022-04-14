<li class="menu-header">Dashboard</li>
<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class=" fas fa-building"></i><span>Dashboard</span></a>
</li>

@role('SuperAdmin|Kabupaten')
<li class="menu-header">Servis</li>
<li class="side-menus {{ Request::is('admin/programs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.programs.index') }}"><i class="fas fa-building"></i><span>Program</span></a>
</li>

<li class="side-menus {{ Request::is('admin/ziswafs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.ziswafs.index') }}"><i class="fas fa-building"></i><span>Ziswaf</span></a>
</li>
@endrole

@role('SuperAdmin|Desa')
<li class="nav-item dropdown {{ Request::is('admin/donatur*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Donasi</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/donatur/program*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.donatur.program.index') }}">Donasi Program</a></li>
        <li class="{{ Request::is('admin/donatur/ziswaf*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.donatur.ziswaf.index') }}">Donasi Ziswaf</a></li>
    </ul>
</li>
@endrole

@role('SuperAdmin|Kecamatan')
<li class="nav-item dropdown {{ Request::is('admin/approval*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Approval Donasi</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/approval/program*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.approval.program.index') }}">Donasi Program</a></li>
        <li class="{{ Request::is('admin/approval/ziswaf*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.approval.ziswaf.index') }}">Donasi Ziswaf</a></li>
    </ul>
</li>
@endrole

@role('SuperAdmin|Desa')
<li class="nav-item dropdown {{ Request::is('admin/permohonan*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Permohonan Bantuan</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/permohonan/ambulan*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.service.ambulan.index') }}">Layanan Ambulan</a></li>
        <li class="{{ Request::is('admin/permohonan/dana*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.service.dana.index') }}">Permohonan Dana</a></li>
    </ul>
</li>
@endrole

@role('SuperAdmin|Kabupaten')
<li class="nav-item dropdown {{ Request::is('admin/report*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Laporan</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/report/laporan-keuangan*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.report.keuangan.index') }}">Laporan Keuangan</a></li>
        <li class="{{ Request::is('admin/report/incomes*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.report.incomes.index') }}">Atur Perolehan</a></li>
    </ul>
</li>
@endrole

@role('SuperAdmin|Kabupaten')
<li class="menu-header">Konten</li>
<li class="side-menus {{ Request::is('admin/banners*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.banners.index') }}"><i class="fas fa-building"></i><span>Banner</span></a>
</li>

<li class="side-menus {{ Request::is('admin/news*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}"><i class="fas fa-building"></i><span>Berita</span></a>
</li>

<li class="side-menus {{ Request::is('admin/galleries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.galleries.index') }}"><i class="fas fa-building"></i><span>Galeri</span></a>
</li>

<li class="side-menus {{ Request::is('admin/services*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="fas fa-building"></i><span>Layanan</span></a>
</li>

<li class="side-menus {{ Request::is('admin/abouts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.abouts.index') }}"><i class="fas fa-building"></i><span>Tentang</span></a>
</li>
@endrole

@role('SuperAdmin')
<li class="menu-header">Master Data</li>
<li class="nav-item dropdown {{ Request::is('admin/category*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Kategori</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/category/news*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.news.index') }}">Kategori Berita</a></li>
        <li class="{{ Request::is('admin/category/program*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.program.index') }}">Kategori Program</a></li>
        <li class="{{ Request::is('admin/category/ziswaf*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.ziswaf.index') }}">Kategori Ziswaf</a></li>
        <li class="{{ Request::is('admin/category/bantuan*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.bantuan.index') }}">Kategori Bantuan</a></li>
    </ul>
</li>

<li class="nav-item dropdown {{ Request::is('admin/location*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Wilayah</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/location/kecamatan*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.location.kecamatan.index') }}">Kecamatan</a></li>
        <li class="{{ Request::is('admin/location/desa*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.location.desa.index') }}">Desa</a></li>
    </ul>
</li>

<li class="side-menus {{ Request::is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-building"></i><span>Akun Pengguna</span></a>
</li>
@endrole
