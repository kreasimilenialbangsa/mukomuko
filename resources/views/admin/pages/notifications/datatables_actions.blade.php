<div class='text-center d-flex justify-content-center'>
    <button class='btn btn-primary btn-xs mr-2'>
        <i class="fa fa-paper-plane"></i>
    </button>
    <a href="{{ route('admin.notifications.edit', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::open(['route' => ['admin.notifications.destroy', $id], 'method' => 'delete', 'class' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs'
    ]) !!}
    {!! Form::close() !!}
</div>
