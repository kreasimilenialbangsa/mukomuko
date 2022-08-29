<div class='text-center d-flex justify-content-center'>
    {{-- <a href="{{ route('admin.donatur.program.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    {{-- <a href="{{ route('admin.donatur.program.list', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-edit"></i> Daftar Donatur
    </a> --}}
    {!! Form::open(['route' => ['admin.approval.update', 'approve', $id], 'method' => 'patch', 'class' => 'approve']) !!}
        {!! Form::button('<i class="fa fa-check"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-success btn-xs mr-2'
        ]) !!}
    {!! Form::close() !!}
    
    {!! Form::open(['route' => ['admin.approval.update', 'reject', $id], 'method' => 'patch', 'class' => 'reject']) !!}
        {!! Form::button('<i class="fa fa-times"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs'
        ]) !!}
    {!! Form::close() !!}
</div>
