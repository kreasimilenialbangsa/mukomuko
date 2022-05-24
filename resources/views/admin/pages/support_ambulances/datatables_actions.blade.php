<div class='text-center d-flex justify-content-center'>
    {{-- <a href="{{ route('admin.service.ambulan.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    
    @if($is_confirm == 0)
    <a href="{{ route('admin.service.ambulan.edit', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    
    {!! Form::open(['route' => ['admin.service.ambulan.destroy', $id], 'method' => 'delete', 'class' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs'
        ]) !!}
    {!! Form::close() !!}
    @endif
</div>

