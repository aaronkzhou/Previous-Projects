<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/','TaskController@getIndex')->middleware('guest');
	Route::get('/tasks','TaskController@index');
	Route::get('/task','TaskController@store');
	Route::post('/task/{task}','TaskController@destory');
	Route::auth();

    //
});
Route::get('test'
	[
	'as a name'=>'this is just a description',
	'uses'=>'TestController@getshit'
	]
	);
