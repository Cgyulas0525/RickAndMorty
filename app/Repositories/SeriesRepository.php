<?php

namespace App\Repositories;

use App\Models\Series;
use App\Repositories\BaseRepository;

/**
 * Class SeriesRepository
 * @package App\Repositories
 * @version May 20, 2023, 5:57 am UTC
*/

class SeriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Series::class;
    }
}
