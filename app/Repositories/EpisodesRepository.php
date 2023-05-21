<?php

namespace App\Repositories;

use App\Models\Episodes;
use App\Repositories\BaseRepository;

/**
 * Class EpisodesRepository
 * @package App\Repositories
 * @version May 20, 2023, 5:57 am UTC
*/

class EpisodesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'serie_id',
        'name',
        'air_date',
        'episode'
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
        return Episodes::class;
    }
}
