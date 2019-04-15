<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class users
 * @package App\Models
 * @version April 13, 2019, 5:30 am UTC
 *
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class users extends Model
{ 
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];
	
    public static function getRoleNames($userId) 
    {

    }

	public static function getDisplayName($userId) 
	{
		$user =  users::where('id', '=',$userId)
					->get(['id','name'])
					->toArray();
		if (count($user)==0 )
			return ''; 
		else 
			return $user['0']['name'];
	}



    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required', 
    ];

    
}
