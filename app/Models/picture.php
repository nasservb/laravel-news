<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class picture
 * @package App\Models
 * @version April 13, 2019, 5:56 am UTC
 *
 * @property string path
 * @property boolean has_thumbnail
 * @property string thumbnail_path
 * @property string item_type
 * @property integer item_id
 */
class picture extends Model
{
    use SoftDeletes;

    public $table = 'picture';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'picture_id',
        'user_id',
        'path',
        'has_thumbnail',
        'thumbnail_path',
        'item_type',
        'item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'picture_id' => 'integer',
        'user_id' => 'integer',
        'path' => 'string',
        'has_thumbnail' => 'boolean',
        'thumbnail_path' => 'string',
        'item_type' => 'string',
        'item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
