<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEpisodesRequest;
use App\Http\Requests\UpdateEpisodesRequest;
use App\Repositories\EpisodesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Episodes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EpisodesController extends AppBaseController
{
    /** @var EpisodesRepository $episodesRepository*/
    private $episodesRepository;

    public function __construct(EpisodesRepository $episodesRepo)
    {
        $this->episodesRepository = $episodesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('episodes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Episodes', $row["id"], 'episodes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Episodes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->episodesRepository->all();
                return $this->dwData($data);

            }

            return view('episodes.index');
        }
    }

    /**
     * Show the form for creating a new Episodes.
     *
     * @return Response
     */
    public function create()
    {
        return view('episodes.create');
    }

    /**
     * Store a newly created Episodes in storage.
     *
     * @param CreateEpisodesRequest $request
     *
     * @return Response
     */
    public function store(CreateEpisodesRequest $request)
    {
        $input = $request->all();

        $episodes = $this->episodesRepository->create($input);

        return redirect(route('episodes.index'));
    }

    /**
     * Display the specified Episodes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $episodes = $this->episodesRepository->find($id);

        if (empty($episodes)) {
            return redirect(route('episodes.index'));
        }

        return view('episodes.show')->with('episodes', $episodes);
    }

    /**
     * Show the form for editing the specified Episodes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $episodes = $this->episodesRepository->find($id);

        if (empty($episodes)) {
            return redirect(route('episodes.index'));
        }

        return view('episodes.edit')->with('episodes', $episodes);
    }

    /**
     * Update the specified Episodes in storage.
     *
     * @param int $id
     * @param UpdateEpisodesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpisodesRequest $request)
    {
        $episodes = $this->episodesRepository->find($id);

        if (empty($episodes)) {
            return redirect(route('episodes.index'));
        }

        $episodes = $this->episodesRepository->update($request->all(), $id);

        return redirect(route('episodes.index'));
    }

    /**
     * Remove the specified Episodes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $episodes = $this->episodesRepository->find($id);

        if (empty($episodes)) {
            return redirect(route('episodes.index'));
        }

        $this->episodesRepository->delete($id);

        return redirect(route('episodes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + episodes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



