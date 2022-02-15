<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $donate->user_id }}</p>
</div>

<!-- Program Id Field -->
<div class="form-group">
    {!! Form::label('program_id', 'Program Id:') !!}
    <p>{{ $donate->program_id }}</p>
</div>

<!-- Location Id Field -->
<div class="form-group">
    {!! Form::label('location_id', 'Location Id:') !!}
    <p>{{ $donate->location_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $donate->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $donate->email }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $donate->phone }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $donate->message }}</p>
</div>

<!-- Total Donate Field -->
<div class="form-group">
    {!! Form::label('total_donate', 'Total Donate:') !!}
    <p>{{ $donate->total_donate }}</p>
</div>

<!-- Is Anonim Field -->
<div class="form-group">
    {!! Form::label('is_anonim', 'Is Anonim:') !!}
    <p>{{ $donate->is_anonim }}</p>
</div>

<!-- Is Confirm Field -->
<div class="form-group">
    {!! Form::label('is_confirm', 'Is Confirm:') !!}
    <p>{{ $donate->is_confirm }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donate->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donate->updated_at }}</p>
</div>

