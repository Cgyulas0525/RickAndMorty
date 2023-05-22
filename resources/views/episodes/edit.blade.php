@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $episodes->episode }} - {{ $episodes->name }} - {{ date('Y.m.d', strtotime($episodes->air_date)) }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($episodes, ['route' => ['episodes.update', $episodes->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('episodes.fields')
                </div>
            </div>

            <div class="card-footer">
{{--                {!! Form::submit('Ment', ['class' => 'btn btn-primary']) !!}--}}
                <a href="{{ route('episodes.index') }}" class="btn btn-default">Kilép</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
