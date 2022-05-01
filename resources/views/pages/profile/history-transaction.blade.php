@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="historytrans-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <x-sidebar-profile/>
        </div>
        <div class="col-md-9">
          <div class="box-white h-100 p-4">
            <h5>Riwayat Transaksi</h5>
            <div class="list-history">
              @forelse($donates as $donate)
                <a href="{{ route('payment.detail', $donate->order_id) }}" class="d-center border-bottom py-4 justify-content-between">
                  <div class="type">
                    <h6>{{ $donate->type == '\App\Models\Admin\Ziswaf' ? @$donate->ziswaf->title :  @$donate->program->title }}</h6>
                    <div class="date-price">
                      <span class="clr-grey">{{ \Carbon\Carbon::parse($donate->created_at)->isoFormat('dddd, D MMMM Y - H:mm') }} WIB |</span>
                      <span class="clr-green">{{ "Rp " . number_format($donate->total_donate,0,",",".") }}</span>
                    </div>
                  </div>
                  <div class="pill-status {{ $donate->is_confirm == 0 ? 'yellow' : ($donate->is_confirm == 1 ? 'green' : 'gray') }}">
                    {{ $donate->is_confirm == 0 ? 'Pending' : ($donate->is_confirm == 1 ? 'Sukses' : 'Kedaluwarsa') }}
                  </div>
                </a>
                @empty
                <div class="empty-state">
                  <img class="icon-empty" src="{{ asset('img/emptystate.png') }}" alt="">
                  <h5 class="mt-4 font-semibold">Data Tidak Ditemukan</h5>
                  <p class="font-medium">Maaf, data yang Anda cari tidak ditemukan</p>
                </div>
                @endforelse
                <div class="d-flex mt-3 justify-content-center">
                  {{ $donates->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection