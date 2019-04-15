<?php

namespace App\Http\Controllers\Admin;

use InfyOm\Generator\Utils\ResponseUtil;
use App\Http\Controllers\Controller;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    
    public function ToIndexedArray($inArray  ) 
    {
        $result = array() ;
        
        foreach($inArray as $item )
        { 
            if (isset( $item['title'] )) 
            {
                $result[$item['id']  ] = $item['title']  ;
            }
            elseif (isset( $item['name'] )) 
            {
                $result[$item['id']  ] = $item['name']  ;
            }
            else 
            {
                $result[$item['id']  ] = $item['tag']  ;
            }
             
        }
        return $result;
    }
}
