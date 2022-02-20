{!! Form::open(['route' => ['admin.donatur.ziswaf.destroy', $id], 'method' => 'delete']) !!}
<div class='text-center'>
    {{-- <a href="{{ route('admin.donatur.ziswaf.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    {{-- <a href="{{ route('admin.donatur.ziswaf.list', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-edit"></i> Daftar Donatur
    </a> --}}
    @if($is_confirm != 1)
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah Anda yakin?')"
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
