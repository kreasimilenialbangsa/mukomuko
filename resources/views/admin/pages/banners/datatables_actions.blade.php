{!! Form::open(['route' => ['admin.banners.destroy', $id], 'method' => 'delete']) !!}
<div class='text-center'>
    {{-- <a href="{{ route('admin.banners.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="{{ route('admin.banners.edit', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah Anda yakin?')"
    ]) !!}
</div>
{!! Form::close() !!}
