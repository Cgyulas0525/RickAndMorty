@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Species Field -->
<div class="form-group col-sm-6">
    {!! Form::label('species', 'Species:') !!}
    {!! Form::text('species', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Origin Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin_name', 'Origin Name:') !!}
    {!! Form::text('origin_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Origin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin_url', 'Origin Url:') !!}
    {!! Form::text('origin_url', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Location Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_name', 'Location Name:') !!}
    {!! Form::text('location_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Location Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_url', 'Location Url:') !!}
    {!! Form::text('location_url', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

