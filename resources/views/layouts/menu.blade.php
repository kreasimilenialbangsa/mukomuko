<li class="side-menus {{ Request::is('admin/locations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.locations.index') }}"><i class="fas fa-building"></i><span>Locations</span></a>
</li>

<li class="side-menus {{ Request::is('admin/kecamatans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.kecamatans.index') }}"><i class="fas fa-building"></i><span>Kecamatans</span></a>
</li>

<li class="side-menus {{ Request::is('admin/desas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.desas.index') }}"><i class="fas fa-building"></i><span>Desas</span></a>
</li>

