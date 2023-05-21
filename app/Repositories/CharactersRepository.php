<?php

namespace App\Repositories;

use App\Models\Characters;
use App\Repositories\BaseRepository;

/**
 * Class CharactersRepository
 * @package App\Repositories
 * @version May 20, 2023, 5:57 am UTC
*/

class CharactersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'status',
        'species',
        'type',
        'gender',
        'origin_name',
        'origin_url',
        'location_name',
        'location_url',
        'image'
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
        return Characters::class;
    }
}
