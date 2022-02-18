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
    <div class="card">
        <div class="card-body border border-top-0">
            <div class="tab-content" id="myTab3Content">
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
                                {!! Form::text('location', null, ['class' => 'form-control']) !!}
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
                    <div class="row-data row">
                        @if(@$program->news)
                            @foreach($program->news as $key => $row)
                                <div class="form col-md-12">
                                    <!-- Delete Button -->
                                    <span class="far fa-times-circle remove position-absolute text-danger" data-id="{{ $row->id }}" style="right: 20px; top: 5px; cursor: pointer; font-size: 20px;"></span>
                                    <!-- Description News Field -->
                                    <div class="form-group border p-3 pt-4">
                                        <div class="d-flex justify-content-between">
                                            {!! Form::label('description', 'Kabar Terbaru '.($key+1).':') !!}
                                            <label>Waktu: {{ date('d/M/Y, H:i', strtotime($row->created_at)) }}</label>
                                        </div>
                                        {!! Form::textarea('news['.$key.'][description]', $row->description, ['class' => 'form-control my-editor']) !!}
                                        {!! Form::hidden('news['.$key.'][id]', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" id="add-data"><i class="fa fa-plus"></i> Tambah Kabar Terbaru</button>
                            </div>
                        </div>
                    </div>
                </div>
@endif
                <!-- Submit Field -->
                <div class="form-group">
                    {!! Form::hidden('del', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('admin.programs.index') }}" class="btn btn-light">Cancel</a>
                </div>
@if(@$program)
            </div>
        </div>
    </div>
</div>
@endif

@push('script')
<script>
    $(document).on('click', '#add-data', function (){
        var key = $('.row-data > .form').length;
        var no = key+1;
        $('.row-data').append(`
            <div class="form col-md-12">
                <!-- Delete Button -->
                <span class="far fa-times-circle remove position-absolute text-danger" style="right: 20px; top: 5px; cursor: pointer; font-size: 20px;"></span>
                <!-- Description News Field -->
                <div class="form-group border p-3 pt-4">
                    <div class="d-flex justify-content-between">
                        {!! Form::label('description', 'Kabar Terbaru ${no}:') !!}
                        <label>Waktu: {{ date('d/M/Y, H:i') }}</label>
                    </div>
                    {!! Form::textarea('news[${key}][description]', null, ['class' => 'form-control my-editor']) !!}
                </div>
            </div>
        `);
        
        var editor_config = {
            path_absolute : "/",
            selector: 'textarea.my-editor',
            height : "300",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                    cmsURL = cmsURL + "&type=Files";
                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        }
        tinymce.init(editor_config);
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
