<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\tags;
use App\Models\category;

/**
 * Class news
 * @package App\Models
 * @version April 13, 2019, 5:59 am UTC
 *
 * @property string title
 * @property string content
 * @property integer picture_id
 * @property string pictures
 * @property integer user_id
 * @property integer status_id
 * @property string|\Carbon\Carbon updeted_at
 */
class news extends Model
{
    use SoftDeletes;

    public $table = 'news';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content',
        'picture_id',
        'pictures',
       // 'tag',
       // 'categories',
        'user_id',
        'status_id',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'picture_id' => 'integer',
        'pictures' => 'string',
        //'tag' => 'string',
        //'categories' => 'string',
        'user_id' => 'integer',
        'status_id' => 'integer',
        'updated_at' => 'datetime'
    ];

    /**
     * The news that belong to the tags.
     */
    public function tags()
    {
        return $this->belongsToMany(tags::class);
    }

    
    /**
     * The news that belong to the category.
     */
    public function categories()
    {
        return $this->belongsToMany(category::class,'news_category');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       // 'user_id' => 'required'
    ];

    
}
