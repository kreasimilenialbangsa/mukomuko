<div class='text-center'>
    {{-- <a href="{{ route('admin.donates.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    <a href="{{ route('admin.donatur.ziswaf.create', $id) }}" class='btn btn-primary btn-xs mr-1'>
        <i class="fa fa-plus"></i>
    </a>
    <a href="{{ route('admin.donatur.ziswaf.list', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-list"></i> ({{ $my_donates_count }})
    </a>
</div>
