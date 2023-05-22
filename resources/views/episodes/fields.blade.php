@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.costumcss')
@endsection

<div class="form-group col-sm-12">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="row">
            @foreach( App\Services\CharacterService::getEpisodeCharacters($episodes->id) as $character )
                @include('episodes.episodecharacter', ['character' => $character])
            @endforeach
        </div>
   </div>
    <div class="text-center">

    </div>

</div>


