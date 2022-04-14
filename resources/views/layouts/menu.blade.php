<li class="side-menus {{ Request::is('admin/locations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.locations.index') }}"><i class="fas fa-building"></i><span>Locations</span></a>
</li>

<li class="side-menus {{ Request::is('admin/kecamatans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.kecamatans.index') }}"><i class="fas fa-building"></i><span>Kecamatans</span></a>
</li>

<li class="side-menus {{ Request::is('admin/desas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.desas.index') }}"><i class="fas fa-building"></i><span>Desas</span></a>
</li>

<li class="side-menus {{ Request::is('admin/incomes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.incomes.index') }}"><i class="fas fa-building"></i><span>Incomes</span></a>
</li>

<li class="side-menus {{ Request::is('admin/supportServices*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.supportServices.index') }}"><i class="fas fa-building"></i><span>Support Services</span></a>
</li>

<li class="side-menus {{ Request::is('admin/supportAmbulances*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.supportAmbulances.index') }}"><i class="fas fa-building"></i><span>Support Ambulances</span></a>
</li>

<li class="side-menus {{ Request::is('admin/supportServiceCategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.supportServiceCategories.index') }}"><i class="fas fa-building"></i><span>Support Service Categories</span></a>
</li>

