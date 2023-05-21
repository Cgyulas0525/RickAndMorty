<?php

namespace App\Services;

use App\Models\Characters;
use Carbon\Carbon;

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

            $character = new Characters;

            $character->id = $charactersArray['id'];
            $character->name = $charactersArray['name'];
            $character->status = $charactersArray['status'];
            $character->species = $charactersArray['species'];
            $character->type = $charactersArray['type'];
            $character->gender = $charactersArray['gender'];
            $character->origin_name = $charactersArray['origin']['name'];
            $character->origin_url = $charactersArray['origin']['url'];
            $character->location_name = $charactersArray['location']['name'];
            $character->location_url = $charactersArray['location']['url'];
            $character->image = $charactersArray['image'];
            $character->created_at = Carbon::now();

            $character->save();

        }


        return $character;

    }

}
