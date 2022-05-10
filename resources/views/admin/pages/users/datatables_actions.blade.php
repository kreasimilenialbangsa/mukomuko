<div class='text-center d-flex'>
    <button type="button" class='btn btn-primary btn-xs mr-2 qr-code' data-id="{{ $id }}" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-qrcode"></i>
    </button>
    <a href="{{ route('admin.account.'.request()->segment(3).'.edit', $id) }}" class='btn btn-warning btn-xs mr-2'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::open(['route' => ['admin.account.'.request()->segment(3).'.destroy', $id], 'method' => 'delete', 'class' => 'delete']) !!}
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs'
    ]) !!}
    {!! Form::close() !!}
</div>
