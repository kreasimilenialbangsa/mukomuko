@extends('admin.layouts.app')
@section('title')
    Riwayat Donasi JPZISNU
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Riwayat Donasi JPZISNU</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Riwayat Donasi JPZISNU</div>
                </div>
            </div>
        </div>
    <div class="section-body">

           <div class="card">
                <div class="card-body">
                @include('admin.pages.donate_histories.jpzisnu.table')
            </div>
       </div>
   </div>

    </section>
@endsection

@push('script')
    <script>
        $(document).on('click','.revoke',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Tolak Donasi',
                icon: 'warning',
                text: "Anda yakin untuk tolak donasi ini?",
                showCancelButton: true,
                confirmButtonColor: '#ffa426',
                cancelButtonColor: '#B9B2B2',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Tolak',
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).submit();
                }
            });
        });
    </script>
@endpush

