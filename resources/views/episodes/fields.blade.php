<!-- Serie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serie_id', 'Serie Id:') !!}
    {!! Form::number('serie_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::number('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Air Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('air_date', 'Air Date:') !!}
    {!! Form::text('air_date', null, ['class' => 'form-control','id'=>'air_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#air_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Episode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('episode', 'Episode:') !!}
    {!! Form::text('episode', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>