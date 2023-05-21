<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CharacterService;
use App\Services\EpisodeService;
use App\Services\EpisodeCharacterService;

use DB;

class DownloadController extends Controller
{

    /**
     * datas of series download from rickandmorty site
     *
     */
    public static function downloadData()
    {

        DB::beginTransaction();

        try {

            $characterService = new CharacterService();
            $episodeService = new EpisodeService();
            $episodeCharacterService = new EpisodeCharacterService();

            $url = "https://rickandmortyapi.com/api/character";
            $count = json_decode(file_get_contents($url), true)['info']['count'];

            for($i = 1; $i <= $count; $i++) {

                $url = "https://rickandmortyapi.com/api/character/".$i;
                $charactersArray = json_decode(file_get_contents($url), true);

                 $character = $characterService->insertCharacter($charactersArray);

                 if (count($charactersArray['episode'])) {

                    foreach ($charactersArray['episode'] as $url) {

                        $episode = $episodeService->handle($url);

                        $episodeCharacterService->handle($episode, $character);

                    }

                 }

            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();

            throw new \Exception($e->getMessage);

        }

    }

}
