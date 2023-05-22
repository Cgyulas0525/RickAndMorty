<?php

namespace App\Services;

use DB;

class HighChartService
{
    public static function characterInYears() {

        return DB::table('characters as t1')
            ->join('episodes as t2', 't2.serie_id', '=', 't1.id')
            ->join('episodecharacters as t3', 't3.episode_id', '=', 't2.id')
            ->join('characters as t4', 't4.id', '=', 't3.character_id')
            ->join('series as t5', 't5.id', '=', 't2.serie_id')
            ->select(DB::raw('t5.name, sum(1) as value' ))
            ->whereIn('t1.id', function($query) {
                $query->from('episodecharacters as t6')->select('t6.character_id')->whereIn('t6.episode_id', function($query) {
                    $query->from('episodes as t7')->select('t7.id')->whereIn('t7.serie_id', function($query) {
                        $query->from('series as t8')->select('t8.id')->get();
                    })->get();
                })->get();
            })->groupBy('t5.name')->get();

    }
}
