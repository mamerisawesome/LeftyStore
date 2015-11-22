
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// home routes
Route::group(array('prefix'=>''),function(){
	Route::get('/', array('uses' => 'HomeController@showLanding', 'as' => 'index'));
	Route::get('/landing', array('uses' => 'HomeController@showLanding', 'as' => 'home'));
});

// user routes
Route::group(array('prefix'=> 'user'), function(){
	Route::get('/signup', array('uses' => 'UserController@signupPage', 'as' => 'signup'));
	Route::post('/signup', array('uses'=> 'UserController@create', 'as' => 'user.create'));
	
	Route::get('/login', array('uses'=> 'SessionController@index', 'as' => 'page.login'));
	Route::post('/login', array('uses'=> 'SessionController@start', 'as' => 'login'));
	
	Route::get('/logout', array('uses'=> 'SessionController@destroy', 'as' => 'logout'));
	
	Route::get('/', array('uses'=> 'UserController@index', 'as' => 'user'));
	Route::get('/{userName}', array('uses' => 'UserController@show', 'as' => 'user.find'));
});

// item routes
Route::group(array('prefix'=> 'item'), function(){
	Route::get('/create', array('uses' => 'ItemsController@createItem', 'as' => 'item.create'));
	Route::post('/create', array('uses'=> 'ItemsController@create', 'as' => 'item.create'));

	Route::get('', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
	Route::get('/list', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
	Route::get('/{itemName}', array('uses' => 'ItemsController@show', 'as' => 'item.find'));

	Route::post('/search', array('uses'=> 'ItemsController@search', 'as' => 'item.search'));
	Route::post('/delete/{itemName}', array('uses'=> 'ItemsController@destroy', 'as' => 'item.delete'));
});