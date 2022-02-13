@if(@$program)
<div class="col-md-12">
    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="form-tab2" data-toggle="tab" href="#form2" role="tab" aria-controls="form" aria-selected="true">Program</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="images-tab2" data-toggle="tab" href="#images2" role="tab" aria-controls="images" aria-selected="false">Kabar Terbaru</a>
        </li>
    </ul>
    <div class="tab-content tab-bordered" id="myTab3Content">
        <div class="tab-pane fade show active" id="form2" role="tabpanel" aria-labelledby="form-tab2">
            <div class="row">
@endif
                <div class="col">
                    <!-- Title Field -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                
                    <!-- Category Id Field -->
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category Id:') !!}
                        {!! Form::select('category_id', $category, null, ['class' => 'form-control select2']) !!}
                    </div>
                
                    <!-- Location Field -->
                    <div class="form-group">
                        {!! Form::label('location', 'Location:') !!}
                        {!! Form::select('location', $location, null, ['class' => 'form-control select2']) !!}
                    </div>
                
                    <!-- Target Dana Field -->
                    <div class="form-group">
                        {!! Form::label('target_dana', 'Target Dana:') !!}
                        {!! Form::number('target_dana', null, ['class' => 'form-control']) !!}
                    </div>
                
                    <!-- End Date Field -->
                    <div class="form-group">
                        {!! Form::label('end_date', 'End Date:') !!}
                        {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="col-md-5">
                    <!-- Image Field -->
                    <div class="form-group">
                        {!! Form::label('image', 'Image:') !!}
                        {!! Form::file('image', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$program->image ? asset('storage/'.$program->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
                    </div>
                
                    <div class="d-flex justify-content-around">
                        <!-- Is Urgent Field -->
                        <div class="form-group">
                            <div class="control-label">Is Urgent:</div>
                            <label class="custom-switch mt-2 pl-0">
                                <input type="checkbox" name="is_urgent" value="1" class="custom-switch-input" {{ @$program->is_urgent == 1 ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                
                        <!-- Is Active Field -->
                        <div class="form-group">
                            <div class="control-label">Is Active:</div>
                            <label class="custom-switch mt-2 pl-0">
                                <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$program->is_active == 1 ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Description Field -->
                <div class="form-group col-md-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control my-editor']) !!}
                </div>
@if(@$program)                
            </div>
        </div>
        <div class="tab-pane fade" id="images2" role="tabpanel" aria-labelledby="images-tab2">
        </div>
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12 mt-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.programs.index') }}" class="btn btn-light">Cancel</a>
</div>
