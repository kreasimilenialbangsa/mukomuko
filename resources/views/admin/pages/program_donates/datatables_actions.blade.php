<div class='text-center d-flex justify-content-center'>
    {{-- <a href="{{ route('admin.donates.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    <a href="{{ route('admin.donatur.program.list', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-list"></i>
    </a>
    @if($count_day != 0)
    <a href="{{ route('admin.donatur.program.create', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-plus"></i>
    </a>
    @endif
</div>
