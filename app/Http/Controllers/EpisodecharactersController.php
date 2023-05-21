<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEpisodecharactersRequest;
use App\Http\Requests\UpdateEpisodecharactersRequest;
use App\Repositories\EpisodecharactersRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Episodecharacters;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class EpisodecharactersController extends AppBaseController
{
    /** @var EpisodecharactersRepository $episodecharactersRepository*/
    private $episodecharactersRepository;

    public function __construct(EpisodecharactersRepository $episodecharactersRepo)
    {
        $this->episodecharactersRepository = $episodecharactersRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('episodecharacters.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Episodecharacters', $row["id"], 'episodecharacters']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Episodecharacters.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->episodecharactersRepository->all();
                return $this->dwData($data);

            }

            return view('episodecharacters.index');
        }
    }

    /**
     * Show the form for creating a new Episodecharacters.
     *
     * @return Response
     */
    public function create()
    {
        return view('episodecharacters.create');
    }

    /**
     * Store a newly created Episodecharacters in storage.
     *
     * @param CreateEpisodecharactersRequest $request
     *
     * @return Response
     */
    public function store(CreateEpisodecharactersRequest $request)
    {
        $input = $request->all();

        $episodecharacters = $this->episodecharactersRepository->create($input);

        return redirect(route('episodecharacters.index'));
    }

    /**
     * Display the specified Episodecharacters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $episodecharacters = $this->episodecharactersRepository->find($id);

        if (empty($episodecharacters)) {
            return redirect(route('episodecharacters.index'));
        }

        return view('episodecharacters.show')->with('episodecharacters', $episodecharacters);
    }

    /**
     * Show the form for editing the specified Episodecharacters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $episodecharacters = $this->episodecharactersRepository->find($id);

        if (empty($episodecharacters)) {
            return redirect(route('episodecharacters.index'));
        }

        return view('episodecharacters.edit')->with('episodecharacters', $episodecharacters);
    }

    /**
     * Update the specified Episodecharacters in storage.
     *
     * @param int $id
     * @param UpdateEpisodecharactersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpisodecharactersRequest $request)
    {
        $episodecharacters = $this->episodecharactersRepository->find($id);

        if (empty($episodecharacters)) {
            return redirect(route('episodecharacters.index'));
        }

        $episodecharacters = $this->episodecharactersRepository->update($request->all(), $id);

        return redirect(route('episodecharacters.index'));
    }

    /**
     * Remove the specified Episodecharacters from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $episodecharacters = $this->episodecharactersRepository->find($id);

        if (empty($episodecharacters)) {
            return redirect(route('episodecharacters.index'));
        }

        $this->episodecharactersRepository->delete($id);

        return redirect(route('episodecharacters.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + episodecharacters::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



