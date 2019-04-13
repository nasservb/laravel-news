<?php

namespace App\Repositories;

use App\Models\picture;
use App\Repositories\BaseRepository;

/**
 * Class pictureRepository
 * @package App\Repositories
 * @version April 13, 2019, 5:56 am UTC
*/

class pictureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'path',
        'has_thumbnail',
        'thumbnail_path',
        'item_type',
        'item_id'
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
        return picture::class;
    }
}
