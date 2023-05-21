<!-- Serie Id Field -->
<div class="col-sm-12">
    {!! Form::label('serie_id', 'Serie Id:') !!}
    <p>{{ $episodes->serie_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $episodes->name }}</p>
</div>

<!-- Air Date Field -->
<div class="col-sm-12">
    {!! Form::label('air_date', 'Air Date:') !!}
    <p>{{ $episodes->air_date }}</p>
</div>

<!-- Episode Field -->
<div class="col-sm-12">
    {!! Form::label('episode', 'Episode:') !!}
    <p>{{ $episodes->episode }}</p>
</div>

