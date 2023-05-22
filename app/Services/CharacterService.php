<?php

namespace App\Services;

use App\Models\Characters;
use App\Models\Episodes;
use Carbon\Carbon;
use DB;

class CharacterService
{

    /**
     * if not found record in characters make new record
     *
     * @param $charactersArray
     * @return Characters
     */
    public function insertCharacter($charactersArray) {

        $character = Characters::find($charactersArray['id']);

        if (!$character) {

            DB::table('characters')->insert([
                'id' => $charactersArray['id'],
                'name' => $charactersArray['name'],
                'status' => $charactersArray['status'],
                'species' => $charactersArray['species'],
                'type' => $charactersArray['type'],
                'gender' => $charactersArray['gender'],
                'origin_name' => $charactersArray['origin']['name'],
                'origin_url' => $charactersArray['origin']['url'],
                'location_name' => $charactersArray['location']['name'],
                'location_url' => $charactersArray['location']['url'],
                'image' => $charactersArray['image'],
                'created_at' => Carbon::now(),
            ]);


            $character = Characters::find($charactersArray['id']);

        }


        return $character;

    }

    public static function getEpisodeCharacters($episode) {
        return Characters::whereIn('id', function ($query) use ($episode) {
            $query->from('episodecharacters')->select('character_id')->where('episode_id', $episode)->get();
        })->get();
    }

    public static function getCharacterEpisodes($character) {
        return Episodes::whereIn('id', function ($query) use ($character) {
            $query->from('episodecharacters')->select('episode_id')->where('character_id', $character)->get();
        })->get();
    }


}
