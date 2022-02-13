<div class="col-md-6">
    <!-- Category Id Field -->
    <div class="form-group">
        {!! Form::label('category_id', 'Category Id:') !!}
        {!! Form::select('category_id', $category, null, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.ziswafs.index') }}" class="btn btn-light">Cancel</a>
</div>
