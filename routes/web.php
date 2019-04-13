<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


//Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
//{
Route::resource('users', 'usersController');

Route::resource('pictures', 'pictureController');

Route::resource('categories', 'categoryController');

Route::resource('statuses', 'statusController');

Route::resource('tags', 'tagsController');

Route::resource('news', 'newsController');

Route::resource('newsMetas', 'news_metaController');

Route::resource('common', 'common');

Route::post('common/uploadAjaxFile', 'common@uploadAjaxFile');
//});