<div class='text-center d-flex'>
    {{-- <a href="{{ route('admin.category.outcome.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('admin.category.outcome.edit', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::open(['route' => ['admin.category.outcome.destroy', $id], 'method' => 'delete', 'class' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs'
    ]) !!}
    {!! Form::close() !!}
</div>
