<?php

namespace App\Repositories;

use App\Models\Episodecharacters;
use App\Repositories\BaseRepository;

/**
 * Class EpisodecharactersRepository
 * @package App\Repositories
 * @version May 20, 2023, 5:56 am UTC
*/

class EpisodecharactersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'episode_id',
        'character_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Episodecharacters::class;
    }
}
