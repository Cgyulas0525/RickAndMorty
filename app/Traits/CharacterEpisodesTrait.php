<?php
namespace App\Traits;

use App\Models\Episodes;
use App\Services\CharacterService;
use DataTables;

trait CharacterEpisodesTrait {

    public function characterEpisodesIndex($character)
    {

        $data = CharacterService::getCharacterEpisodes($character);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('characterNumber', function ($data) {
                return ($data->characterNumber);
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('episodes.edit', [$row->id]) . '"
                     class="edit btn btn-success btn-sm editProduct" title="Adatlap"><i class="fa fa-list-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);


    }
}
