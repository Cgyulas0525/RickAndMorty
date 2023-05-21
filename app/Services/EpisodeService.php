<?php

namespace App\Services;

use App\Models\Episodes;
use Carbon\Carbon;
use App\Services\SerieService;

class EpisodeService
{

    public function handle($url) {

        $episodeArray = json_decode(file_get_contents($url), true);

        $episode = Episodes::find($episodeArray['id']);

        if (!$episode) {

            $serieService = new SerieService();

            $serie = $serieService->handle(substr($episodeArray['episode'], 0, 3));

            $episode = new Episodes;

            $episode->id = $episodeArray['id'];
            $episode->serie_id = $serie->id;
            $episode->name = $episodeArray['name'];
            $episode->air_date = $episodeArray['air_date'];
            $episode->episode = $episodeArray['episode'];
            $episode->created_at = Carbon::now();

            $episode->save();

        }

        return $episode;

    }
}
