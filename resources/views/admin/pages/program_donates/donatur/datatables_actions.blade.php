{!! Form::open(['route' => ['admin.donatur.program.destroy', $id], 'method' => 'delete']) !!}
<div class='text-center d-flex justify-content-between'>
    {{-- <a href="{{ route('admin.donatur.program.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    {{-- <a href="{{ route('admin.donatur.program.list', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-edit"></i> Daftar Donatur
    </a> --}}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
