<div>
  <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
  <a class="dropdown-item" href="{{ route('user.changePassword') }}">Ubah Password</a>
  <a class="dropdown-item" href="{{ route('user.history') }}">Riwayat transaksi</a>
  {{-- <a class="dropdown-item" href="{{ route('user.inbox') }}">Inbox</a>
  <a class="dropdown-item" href="{{ route('user.notification') }}">Notifikasi</a> --}}
  <a class="dropdown-item" href="#"  
  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</div>