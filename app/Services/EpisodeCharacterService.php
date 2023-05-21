<?php

namespace App\Services;

use App\Models\Episodecharacters;

class EpisodeCharacterService
{

    public function handle($episode, $character) {

        $episodeCharacter = Episodecharacters::where('episode_id', $episode->id)
            ->where('character_id', $character->id)
            ->first();

        if (!$episodeCharacter) {

            $episodeCharacter = new EpisodeCharacters;

            $episodeCharacter->episode_id = $episode->id;
            $episodeCharacter->character_id = $character->id;

            $episodeCharacter->save();

        }

    }
}
