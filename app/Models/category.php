<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\news;

/**
 * Class category
 * @package App\Models
 * @version April 13, 2019, 5:57 am UTC
 *
 * @property string title
 * @property string slag
 * @property integer parent_id
 */
class category extends Model
{
    use SoftDeletes;

    public $table = 'category';
    
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
        'title',
        'slag',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slag' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
    
    /**
     * The news that belong to the category.
     */
    public function news()
    {
        return $this->belongsToMany(news::class,'news_category');
    }
    
}
