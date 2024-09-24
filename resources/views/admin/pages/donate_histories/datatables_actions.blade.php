<div class='text-center'>
    {!! Form::open(['route' => ['admin.donate_histories.update', $id], 'method' => 'post', 'class'=> 'revoke']) !!}
    {!! Form::button('<i class="fa fa-redo"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-warning btn-xs'
    ]) !!}
    {!! Form::close() !!}
</div>
