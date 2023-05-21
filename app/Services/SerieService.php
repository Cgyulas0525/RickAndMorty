<?php

namespace App\Services;

use App\Models\Series;
use Carbon\Carbon;

class SerieService
{

    public function handle($name) {

        $serie = Series::where('name', $name)->first();

        if (!$serie) {

            $serie = new Series;

            $serie->name = $name;
            $serie->created_at = Carbon::now();

            $serie->save();

        }

        return $serie;


    }
}
