<li class="menu-header">Dashboard</li>
<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class=" fas fa-building"></i><span>Dashboard</span></a>
</li>

<li class="menu-header">Service</li>
<li class="side-menus {{ Request::is('admin/programs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.programs.index') }}"><i class="fas fa-building"></i><span>Programs</span></a>
</li>

<li class="side-menus {{ Request::is('admin/ziswafs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.ziswafs.index') }}"><i class="fas fa-building"></i><span>Ziswaf</span></a>
</li>

<li class="menu-header">Content</li>
<li class="side-menus {{ Request::is('admin/banners*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.banners.index') }}"><i class="fas fa-building"></i><span>Banners</span></a>
</li>

<li class="side-menus {{ Request::is('admin/news*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}"><i class="fas fa-building"></i><span>News</span></a>
</li>

<li class="side-menus {{ Request::is('admin/galleries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.galleries.index') }}"><i class="fas fa-building"></i><span>Galleries</span></a>
</li>

<li class="side-menus {{ Request::is('admin/services*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.services.index') }}"><i class="fas fa-building"></i><span>Services</span></a>
</li>

<li class="side-menus {{ Request::is('admin/abouts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.abouts.index') }}"><i class="fas fa-building"></i><span>Abouts</span></a>
</li>

<li class="menu-header">Master Data</li>
<li class="nav-item dropdown {{ Request::is('admin/category*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Categories</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/category/news*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.news.index') }}">News Categories</a></li>
        <li class="{{ Request::is('admin/category/program*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.program.index') }}">Program Categories</a></li>
        <li class="{{ Request::is('admin/category/ziswaf*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category.ziswaf.index') }}">Ziswaf Categories</a></li>
    </ul>
</li>

<li class="nav-item dropdown {{ Request::is('admin/location*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i> <span>Location</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('admin/location/kecamatan*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.location.kecamatan.index') }}">Kecamatan</a></li>
        <li class="{{ Request::is('admin/location/desa*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.location.desa.index') }}">Desa</a></li>
    </ul>
</li>

<li class="side-menus {{ Request::is('admin/users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-building"></i><span>Users</span></a>
</li>

