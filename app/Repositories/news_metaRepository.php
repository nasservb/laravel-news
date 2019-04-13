<?php

namespace App\Repositories;

use App\Models\news_meta;
use App\Repositories\BaseRepository;

/**
 * Class news_metaRepository
 * @package App\Repositories
 * @version April 13, 2019, 7:32 am UTC
*/

class news_metaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'meta_key',
        'meta_value',
        'news_id'
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
        return news_meta::class;
    }
}
