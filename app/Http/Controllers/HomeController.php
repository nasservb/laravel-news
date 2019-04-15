<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
      //$role = Role::create(['name' => 'writer']);
		//var_dump( Permission::create(['name' => 'add articles']));
		
		//$user = Auth::user(); 
		
		//$user->assignRole('manager');
        
		return view('home');
    }
}
