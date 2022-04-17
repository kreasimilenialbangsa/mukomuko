{{-- {!! Form::open(['route' => ['admin.approval.update', $id], 'method' => 'patch', 'class' => 'approve']) !!} --}}
<div class='text-center'>
    {{-- <a href="{{ route('admin.donatur.program.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    <a href="{{ route('admin.approval.dana.edit', $id) }}" class='btn btn-warning btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    {{-- {!! Form::button('<i class="fa fa-check"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-success btn-xs'
    ]) !!}
</div>
{!! Form::close() !!} --}}
