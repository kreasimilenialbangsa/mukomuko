<div class="col-md-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nama') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    @if(request()->segment(3) == 'members')
    <!-- Role Field -->
    <div class="form-group">
        {!! Form::label('role', 'Tipe Akun:') !!}
        {!! Form::select('role', $role, @$user->role_user->role->id, ['class' => 'form-control select2 role']) !!}
    </div>

    <!-- Location Field -->
    <div class="form-group location d-none">
        {!! Form::label('location', 'Wilayah:') !!}
        {!! Form::select('location', [], null, ['class' => 'form-control select2-user']) !!}
    </div>
    @endif
</div>

<div class="col-md-6">
    <!-- Password Field -->
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Confirmation Password Field -->
    <div class="form-group">
        {!! Form::label('password', 'Konfirmasi Password') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <!-- Is Active Field -->
    <div class="form-group">
        <div class="control-label">Aktif:</div>
        <label class="custom-switch mt-2 pl-0">
            <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$user->is_active == 1 ? 'checked' : '' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.account.'.request()->segment(3).'.index') !!}" class="btn btn-default">Batal</a>
</div>

@push('script')
    <script>
        
        $(document).ready(function() {
            var val;

            val = $('.role').val();

            if(val > 2 && val < 5) {
                $('.location').removeClass('d-none')
            } else {
                $('.location').addClass('d-none')
            }

            $('.role').on('change', function() {
                val = $(this).val();

                if(val > 2 && val < 5) {
                    $('.location').removeClass('d-none')
                } else {
                    $('.location').addClass('d-none')
                }

                $('.select2-user').val('').trigger('change');
            });

            $('.select2-user').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih',
                ajax: {
                    url: "{{ route('admin.account.'.request()->segment(3).'.create') }}",
                    dataType: 'json',
                    data: function (params) {
                        var queryParameters = {
                            term: params.term,
                            type: val
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            @if(@$user->kecamatan->name))
                var newOption1 = new Option('{{ @$user->kecamatan->name }}', {{@$user->location_id }}, true, true);
                $('.select2-user').append(newOption1).trigger('change');
            @elseif(@$user->desa->name)
                var newOption1 = new Option('{{ @$user->desa->name }}', {{@$user->location_id }}, true, true);
                $('.select2-user').append(newOption1).trigger('change');
            @endif
        });
    </script>
@endpush
