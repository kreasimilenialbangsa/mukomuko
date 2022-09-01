<div class='text-center d-flex'>
    {{-- <a href="{{ route('admin.donatur.program.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @if($is_confirm != 1)
    <a href="{{ route('admin.donatur.program.edit', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::open(['route' => ['admin.donatur.program.destroy', $type_id, $id], 'method' => 'delete', 'class' => 'delete']) !!}
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs'
        ]) !!}
        @endif
    {!! Form::close() !!}
</div>
