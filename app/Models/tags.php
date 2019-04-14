<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tags
 * @package App\Models
 * @version April 13, 2019, 5:58 am UTC
 *
 * @property string tag
 */
class tags extends Model
{
     
    public $table = 'tags';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public static function getTagArray($str) {
		
		$tags = explode(',',$str); 
		$result =array(); 
		
		foreach ($tags as $tag)
		{
			if (strlen(trim($tag))>2)
				$result[]=  $tag ;
		}
		
		 
		return $result; 
	}
	
	
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
        'tag' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'updated_at' => 'required'
    ];

    
}
