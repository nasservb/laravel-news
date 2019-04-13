<?php

namespace App\Repositories;

use App\Models\news;
use App\Repositories\BaseRepository;

/**
 * Class newsRepository
 * @package App\Repositories
 * @version April 13, 2019, 5:59 am UTC
*/

class newsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'picture_id',
        'pictures',
        'tag',
        'categories',
        'user_id',
        'status_id',
        'updated_at'
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
        return news::class;
    }
}
