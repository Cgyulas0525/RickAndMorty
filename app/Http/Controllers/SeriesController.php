<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Repositories\SeriesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Series;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class SeriesController extends AppBaseController
{
    /** @var SeriesRepository $seriesRepository*/
    private $seriesRepository;

    public function __construct(SeriesRepository $seriesRepo)
    {
        $this->seriesRepository = $seriesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('series.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Series', $row["id"], 'series']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Series.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->seriesRepository->all();
                return $this->dwData($data);

            }

            return view('series.index');
        }
    }

    /**
     * Show the form for creating a new Series.
     *
     * @return Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created Series in storage.
     *
     * @param CreateSeriesRequest $request
     *
     * @return Response
     */
    public function store(CreateSeriesRequest $request)
    {
        $input = $request->all();

        $series = $this->seriesRepository->create($input);

        return redirect(route('series.index'));
    }

    /**
     * Display the specified Series.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $series = $this->seriesRepository->find($id);

        if (empty($series)) {
            return redirect(route('series.index'));
        }

        return view('series.show')->with('series', $series);
    }

    /**
     * Show the form for editing the specified Series.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $series = $this->seriesRepository->find($id);

        if (empty($series)) {
            return redirect(route('series.index'));
        }

        return view('series.edit')->with('series', $series);
    }

    /**
     * Update the specified Series in storage.
     *
     * @param int $id
     * @param UpdateSeriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeriesRequest $request)
    {
        $series = $this->seriesRepository->find($id);

        if (empty($series)) {
            return redirect(route('series.index'));
        }

        $series = $this->seriesRepository->update($request->all(), $id);

        return redirect(route('series.index'));
    }

    /**
     * Remove the specified Series from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $series = $this->seriesRepository->find($id);

        if (empty($series)) {
            return redirect(route('series.index'));
        }

        $this->seriesRepository->delete($id);

        return redirect(route('series.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + series::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



