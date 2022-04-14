<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $supportService->user_id }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $supportService->category_id }}</p>
</div>

<!-- Reason Field -->
<div class="form-group">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{{ $supportService->reason }}</p>
</div>

<!-- Nominal Field -->
<div class="form-group">
    {!! Form::label('nominal', 'Nominal:') !!}
    <p>{{ $supportService->nominal }}</p>
</div>

<!-- Is Confirm Field -->
<div class="form-group">
    {!! Form::label('is_confirm', 'Is Confirm:') !!}
    <p>{{ $supportService->is_confirm }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $supportService->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $supportService->updated_at }}</p>
</div>

