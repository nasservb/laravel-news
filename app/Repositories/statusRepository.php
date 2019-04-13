<?php

namespace App\Repositories;

use App\Models\status;
use App\Repositories\BaseRepository;

/**
 * Class statusRepository
 * @package App\Repositories
 * @version April 13, 2019, 5:58 am UTC
*/

class statusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
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
        return status::class;
    }
}
