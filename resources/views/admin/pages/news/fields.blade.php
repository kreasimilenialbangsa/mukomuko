<div class="col-md-12">
    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="form-tab2" data-toggle="tab" href="#form2" role="tab" aria-controls="form" aria-selected="true">BERITA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="images-tab2" data-toggle="tab" href="#images2" role="tab" aria-controls="images" aria-selected="false">GAMBAR</a>
        </li>
    </ul>
    <div class="card">
        <div class="card-body border border-top-0">
            <div class="tab-content" id="myTab3Content">
                <div class="tab-pane fade show active" id="form2" role="tabpanel" aria-labelledby="form-tab2">
                    <!-- Title Field -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Category Id Field -->
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category Id:') !!}
                                {!! Form::select('category_id', $category, null, ['class' => 'form-control select2']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-around">
                            <div class="form-group">
                                <div class="control-label">Is Highlight:</div>
                                <label class="custom-switch mt-2 pl-0">
                                    <input type="checkbox" name="is_highlight" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                                            
                            <div class="form-group">
                                <div class="control-label">Is Active:</div>
                                <label class="custom-switch mt-2 pl-0">
                                    <input type="checkbox" name="is_active" value="1" class="custom-switch-input" checked>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                
                        </div>
                    </div>

                    <!-- Content Field -->
                    <div class="form-group">
                        {!! Form::label('content', 'Content:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control my-editor']) !!}
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="images2" role="tabpanel" aria-labelledby="images-tab2">
                    <div class="row-data row">
                        @if(@$news->images)
                            @foreach ($news->images as $key => $row)
                            <div class="form col-md-6">
                                @if($key > 0)
                                    <span class="far fa-times-circle remove position-absolute text-danger" data-id="{{ $row->id }}" style="right: 15px; cursor: pointer; font-size: 20px;"></span>
                                @endif
                                <!-- Image Field -->
                                <div class="form-group">
                                    {!! Form::label('image', 'Image:') !!}
                                    {!! Form::file('images['.$key.'][file]', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-show-remove' => 'false', 'data-height' => '300', 'data-default-file' => @$row->file ? asset('storage/'.$row->file) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
                                </div>
                                {!! Form::hidden('images['.$key.'][id]', null, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        @else
                        <div class="form col-md-6">
                            <!-- Image Field -->
                            <div class="form-group">
                                {!! Form::label('image', 'Image:') !!}
                                {!! Form::file('images[0][file]', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-show-remove' => 'false', 'data-height' => '300', 'data-default-file' => @$banner->image ? asset('storage/'.$banner->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" id="add-data"><i class="fa fa-plus"></i> Add Image</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Field -->
            <div class="form-group">
                {!! Form::hidden('del', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.news.index') }}" class="btn btn-light">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
     $(document).on('click', '#add-data', function (){
        var key = $('.row-data > .form').length;
        var no = key+1;
        $('.row-data').append(`
            <div class="form col-md-6">
                <!-- Delete Button -->
                <span class="far fa-times-circle remove position-absolute text-danger" style="right: 15px; cursor: pointer; font-size: 20px;"></span>
                <!-- Image Field -->
                <div class="form-group">
                    {!! Form::label('images', 'Image:') !!}
                    <input type="file" class="dropify" name="images[${key}][file]" data-height="300" data-allowed-file-extensions="jpeg png jpg" "data-show-remove"="false", accept=".png, .jpg, .jpeg" data-max-file-size="2M">
                </div>
            </div>
        `);
        
        $('.dropify').dropify({
            messages: {
                default: 'Drag and drop file here or click',
                replace: 'Drag and drop file here or click to Replace',
                remove:  'Remove',
                error:   'Sorry, the file is too large'
            }
        });
     });

        // Delete data
        var del = [];
        $(document).on('click', '.remove', function (){
            var x = confirm("Are you sure you want to delete?");
            
            if(x) {
                var id = $(this).data('id');
                del.push(id);
                
                $(this).parents('.form').remove();
                $('input[name=del]').val(del);
            } else {
                return false;
            }
        });
</script>
@endpush