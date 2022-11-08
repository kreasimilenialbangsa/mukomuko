
<aside class="sidebar-profile box-white mb-4">
  <div class="d-center">
    <span class="ava-profile mr-3">
      <ion-icon name="person-sharp"></ion-icon>
    </span>
    <span class="h5 mb-0 w-75 font-medium">{{ $user->name }}</span>
  </div>
  <ul class="no-list pt-2 nav-profile">
    <li class="mt-4">
      <a class="profile-link d-center {{ Request::is('user/profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
        <img class="ic-side" src="{{ asset('img/profile-ic.svg') }}" alt="">
        Profil
      </a>
    </li>
    <li class="mt-4">
      <a class="profile-link d-center {{ Request::is('user/change-password') ? 'active' : '' }}" href="{{ route('user.changePassword') }}">
        <img class="ic-side" src="{{ asset('img/change-password.svg') }}" alt="">
        Ubah Password
      </a>
    </li>
    <li class="mt-4">
      <a class="profile-link d-center {{ Request::is('user/profile/history-transaction') ? 'active' : '' }}" href="{{ route('user.history') }}">
        <img class="ic-side" src="{{ asset('img/transaction-ic.svg') }}" alt="">
        Riwayat Transaksi
      </a>
    </li>
    {{-- <li class="mt-4">
      <a class="profile-link d-center {{ Request::is('user/profile/inbox') ? 'active' : '' }}" href="{{ route('user.inbox') }}">
        <img class="ic-side" src="{{ asset('img/inbox-ic.svg') }}" alt="">
        Inbox
      </a>
    </li> --}}
    <li class="mt-4">
      <a class="profile-link d-center {{ Request::is('user/profile/notification') ? 'active' : '' }}" href="{{ route('user.notification') }}">
        <img class="ic-side" src="{{ asset('img/notif-ic.svg') }}" alt="">
        Notifikasi
      </a>
    </li>
    <li class="mt-4">
      <a class="profile-link d-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <img class="ic-side" src="{{ asset('img/logout-ic.svg') }}" alt="">
        Keluar
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</aside>
