<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class news_meta
 * @package App\Models
 * @version April 13, 2019, 7:32 am UTC
 *
 * @property string meta_key
 * @property string meta_value
 * @property integer news_id
 */
class news_meta extends Model
{
    use SoftDeletes;

    public $table = 'news_meta';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'meta_key',
        'meta_value',
        'news_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'meta_key' => 'string',
        'meta_value' => 'string',
        'news_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'meta_key' => 'required',
        'news_id' => 'required'
    ];

    
}
