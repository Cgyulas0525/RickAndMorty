<?php
namespace App\Traits;

use App\Models\Episodes;
use DataTables;

trait SerieEpisods
{

    public function serieEpisodsIndex($serie = null, $begin = null, $end = null)
    {

        if (is_null($begin)) {
            $data = Episodes::where(function ($query) use ($serie) {
                if (is_null($serie) || $serie == -9999) {
                    $query->whereNotNull('serie_id');
                } else {
                    $query->where('serie_id', '=', $serie);
                }
            })->get();
        } else {
            $data = Episodes::whereBetween('air_date', [$begin, $end])->get();
        }

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
