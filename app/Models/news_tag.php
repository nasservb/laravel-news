<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class news_tag
 * @package App\Models
 * @version April 14, 2019, 14:45 am UTC
 *
 * @property string tag
 */
class news_tag extends Model
{
    
    public $table = 'news_tag';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
 
	
    public $fillable = [
        'tag'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'news_id' => 'integer',
        'tag_id' => 'integer'
    ];

	 public function news(){
        return $this->belongsTo(news::class,'news_id');
    }


	 public function tags(){
        return $this->belongsTo(tags::class,'tag_id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'news_id' => 'required',
        'tag_id' => 'required'
    ];

}
