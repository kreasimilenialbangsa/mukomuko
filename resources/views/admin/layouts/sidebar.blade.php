<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo-nu.png') }}" width="210px"
             alt="Infyom Logo">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo-nu.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('admin.layouts.menu')
    </ul>
</aside>
