<?php

namespace App\Repositories;

use App\Models\tags;
use App\Repositories\BaseRepository;

/**
 * Class tagsRepository
 * @package App\Repositories
 * @version April 13, 2019, 5:58 am UTC
*/

class tagsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag'
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
        return tags::class;
    }
}
