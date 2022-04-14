<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $supportAmbulance->user_id }}</p>
</div>

<!-- Is Confirm Field -->
<div class="form-group">
    {!! Form::label('is_confirm', 'Is Confirm:') !!}
    <p>{{ $supportAmbulance->is_confirm }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $supportAmbulance->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $supportAmbulance->updated_at }}</p>
</div>

