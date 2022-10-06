@extends('admin.layouts.app')

@section('title')
    Donasi Ziswaf
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Donasi Ziswaf</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Donasi Ziswaf</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.donatur.program.create')}}" class="btn btn-primary form-btn">Donate <i class="fas fa-plus"></i></a> --}}
            </div>
        </div>
    <div class="section-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            @foreach($ziswafCategories as $key => $ziswafCat)
            <li class="nav-item">
                <a class="nav-link {{ $key == 0 ? 'active' : ''}}" id="{{$ziswafCat->slug}}-tab" data-toggle="tab" href="#{{$ziswafCat->slug}}" role="tab" aria-controls="{{$ziswafCat->slug}}" aria-selected="true">{{$ziswafCat->name}}</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="infaq-tab" data-toggle="tab" href="#infaq" role="tab" aria-controls="infaq" aria-selected="false">Infaq</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="wakaf" aria-selected="false">Wakaf</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shadaqah-tab" data-toggle="tab" href="#shadaqah" role="tab" aria-controls="shadaqah" aria-selected="false">Shadaqah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="fidyah-tab" data-toggle="tab" href="#fidyah" role="tab" aria-controls="fidyah" aria-selected="false">Fidyah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="amil-tab" data-toggle="tab" href="#amil" role="tab" aria-controls="amil" aria-selected="false">Dana Amil</a>
            </li> --}}
            @endforeach
            <li class="nav-item">
                <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Donasi</a>
            </li>
        </ul>
        <div class="card border border-top-0">
            <div class="card-body">
                <div class="tab-content" id="myTab3Content">
                    @foreach($ziswafCategories as $key => $ziswafCat)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : ''}}" id="{{$ziswafCat->slug}}" role="tabpanel" aria-labelledby="{{$ziswafCat->slug}}-tab2">
                        @include('admin.pages.ziswaf_donates.table', ['ziswaf' => $ziswafCat])
                    </div>
                    @endforeach
                    {{-- <div class="tab-pane fade" id="infaq" role="tabpanel" aria-labelledby="infaq-tab2">
                        @include('admin.pages.ziswaf_donates.table_infaq')
                    </div>
                    <div class="tab-pane fade" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab2">
                        @include('admin.pages.ziswaf_donates.table_wakaf')
                    </div>
                    <div class="tab-pane fade" id="shadaqah" role="tabpanel" aria-labelledby="shadaqah-tab2">
                        @include('admin.pages.ziswaf_donates.table_shadaqah')
                    </div>
                    <div class="tab-pane fade" id="fidyah" role="tabpanel" aria-labelledby="fidyah-tab2">
                        @include('admin.pages.ziswaf_donates.table_fidyah')
                    </div>
                    <div class="tab-pane fade" id="amil" role="tabpanel" aria-labelledby="amil-tab2">
                        @include('admin.pages.ziswaf_donates.table_amil')
                    </div> --}}
                    <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab2">
                        Riwayat
                    </div>
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

@push('style')
    @include('admin.layouts.datatables_css')
@endpush

@push('script')
    @include('admin.layouts.datatables_js')

    <script>
        $(function(){
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function (e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        });
    </script>
@endpush

