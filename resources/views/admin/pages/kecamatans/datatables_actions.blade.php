{!! Form::open(['route' => ['admin.location.kecamatan.destroy', $id], 'method' => 'delete']) !!}
<div class='text-center'>
    {{-- <a href="{{ route('admin.location.kecamatan.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('admin.location.kecamatan.edit', $id) }}" class='btn btn-warning'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
