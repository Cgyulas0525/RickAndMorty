<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCharactersRequest;
use App\Http\Requests\UpdateCharactersRequest;
use App\Repositories\CharactersRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Characters;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;
use Response;
use Auth;
use DataTables;

use App\Traits\CharacterEpisodesTrait;

class CharactersController extends AppBaseController
{
    /** @var CharactersRepository $charactersRepository*/
    private $charactersRepository;

    public function __construct(CharactersRepository $charactersRepo)
    {
        $this->charactersRepository = $charactersRepo;
    }

    use CharacterEpisodesTrait;

    public function dwData($data): object
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('episodeNumber', function($data) { return ($data->episodeNumber); })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('characters.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Adatlap"><i class="fa fa-list-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Characters.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

//                $cachedEpisodes = Redis::get('characters');
//
//                if(isset($cachedEpisodes)) {
//                    $data = $cachedEpisodes;
//                }else {
//                    $data = $this->charactersRepository->all();
//                    Redis::set('characters', $data);
//                }

                $data = $this->charactersRepository->all();
                return $this->dwData($data);

            }

            return view('characters.index');
        }
    }

    /**
     * Show the form for creating a new Characters.
     *
     * @return Response
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created Characters in storage.
     *
     * @param CreateCharactersRequest $request
     *
     * @return Response
     */
    public function store(CreateCharactersRequest $request)
    {
        $input = $request->all();

        $characters = $this->charactersRepository->create($input);

        return redirect(route('characters.index'));
    }

    /**
     * Display the specified Characters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $characters = $this->charactersRepository->find($id);

        if (empty($characters)) {
            return redirect(route('characters.index'));
        }

        return view('characters.show')->with('characters', $characters);
    }

    /**
     * Show the form for editing the specified Characters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $characters = $this->charactersRepository->find($id);

        if (empty($characters)) {
            return redirect(route('characters.index'));
        }

        return view('characters.edit')->with('characters', $characters);
    }

    /**
     * Update the specified Characters in storage.
     *
     * @param int $id
     * @param UpdateCharactersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCharactersRequest $request)
    {
        $characters = $this->charactersRepository->find($id);

        if (empty($characters)) {
            return redirect(route('characters.index'));
        }

        $characters = $this->charactersRepository->update($request->all(), $id);

        return redirect(route('characters.index'));
    }

    /**
     * Remove the specified Characters from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $characters = $this->charactersRepository->find($id);

        if (empty($characters)) {
            return redirect(route('characters.index'));
        }

        $this->charactersRepository->delete($id);

        return redirect(route('characters.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + characters::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



