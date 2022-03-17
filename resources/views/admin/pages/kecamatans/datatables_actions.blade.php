<div class='text-center d-flex'>
    {{-- <a href="{{ route('admin.location.kecamatan.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('admin.location.kecamatan.edit', $id) }}" class='btn btn-warning mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::open(['route' => ['admin.location.kecamatan.destroy', $id], 'method' => 'delete', 'class' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger'
    ]) !!}
    {!! Form::close() !!}
</div>
