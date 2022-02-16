<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Program Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_id', 'Program Id:') !!}
    {!! Form::number('program_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location Id:') !!}
    {!! Form::number('location_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Donate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_donate', 'Total Donate:') !!}
    {!! Form::number('total_donate', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Anonim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_anonim', 'Is Anonim:') !!}
    {!! Form::number('is_anonim', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Confirm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_confirm', 'Is Confirm:') !!}
    {!! Form::number('is_confirm', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.donatur.program.index') }}" class="btn btn-light">Cancel</a>
</div>
