<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateadsRequest;
use App\Http\Requests\UpdateadsRequest;
use App\Http\Controllers\AppBaseController;

use App\Models\picture ;

 
use Illuminate\Http\Request;
use Flash;

use Response;
use Image; 
use Auth; 

use Prettus\Repository\Criteria\RequestCriteria;

class common extends    AppBaseController
{
	/**
	*
	*
	*
	**/
    public function uploadAjaxFile(  Request $request ) 
	{
		$input = $request->all();
		
		if ($request->hasFile('file')) {
			 
			if($request->file('file')->isValid()) {
				 
				try {

					$file = $request->file('file');
					$name = time() . '.' . $file->getClientOriginalExtension();

					$date = \Morilog\Jalali\Jalalian::now();
					
					$path = public_path("picture".  DIRECTORY_SEPARATOR ."news").  DIRECTORY_SEPARATOR .  $date->format('Y-m-d'); 
					 
					if (!file_exists($path))
                        mkdir($path, 0755);
					 
					if (!file_exists($path))
						$path = public_path("picture". DIRECTORY_SEPARATOR  . "news");
					 
					
					$request->file('file')->move($path, $name);
					
					$name_arr = explode('.',$name); 
					$thumbnailPath =$path . DIRECTORY_SEPARATOR .$name_arr[0]. '_200x200.'.$name_arr[1];		
										
					$image = Image::make($path. DIRECTORY_SEPARATOR  . $name)->resize(200, 200)->save($thumbnailPath);
					
					$date = jdate();
					
					$path = str_replace(public_path(''),'',$path) ; 
					$thumbnailPath = str_replace(public_path(''),'',$thumbnailPath) ; 
					
					
					
					$picture = new picture() ; 				
					$picture->path= $path. DIRECTORY_SEPARATOR  .$name;
					$picture->thumbnail_path=$thumbnailPath;
					$picture->has_thumbnail=1;
					$picture->user_id=Auth::user()->id;
					$picture->item_id=0;
					$picture->item_type=$input['key']; //'news';
					$picture->save(); 
				} catch (Illuminate\Filesystem\FileNotFoundException $e) {
					return '403';
				}
			} 
		}
	}
}
