
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
	Route::post('/search', array('uses'=> 'SessionController@search', 'as' => 'search'));
});

// user routes
Route::group(array('prefix'=> 'user'), function(){
	Route::get('/signup', array('uses' => 'UserController@signupPage', 'as' => 'signup'));
	Route::post('/signup', array('uses'=> 'UserController@create', 'as' => 'user.create'));
	
	Route::post('/destroy/{username}', array('uses' => 'UserController@destroy', 'as' => 'page.user.destroy'));
	Route::get('/edit/{username}', array('uses' => 'UserController@edit', 'as' => 'page.user.edit'));
	Route::post('/update/{username}', array('uses' => 'UserController@update', 'as' => 'user.update'));
	
	Route::get('/login', array('uses'=> 'SessionController@index', 'as' => 'page.login'));
	Route::post('/login', array('uses'=> 'SessionController@start', 'as' => 'login'));
	
	Route::get('/logout', array('uses'=> 'SessionController@destroy', 'as' => 'logout'));
	
	Route::get('/', array('uses'=> 'UserController@index', 'as' => 'user'));
	Route::get('/{userName}', array('uses' => 'UserController@show', 'as' => 'user.find'));
});

// admin routes
Route::group(array('prefix'=> 'admin'), function(){
	Route::get('/item/approve', array('uses'=>'ItemsController@approvePage','as'=>'page.item.approve'));
	Route::post('/item/approve/{username}', array('uses'=>'ItemsController@approve','as'=>'item.approve'));
	Route::post('/item/disapprove/{username}', array('uses'=>'ItemsController@disapprove','as'=>'item.disapprove'));
	
	Route::get('/approve', array('uses'=>'AdminController@approvePage','as'=>'page.approve'));
	Route::post('/approve/{username}', array('uses'=>'AdminController@approve','as'=>'approve'));
	Route::post('/disapprove/{username}', array('uses'=>'AdminController@disapprove','as'=>'disapprove'));
});

// item routes
Route::group(array('prefix'=> 'item'), function(){
	Route::get('/create', array('uses' => 'ItemsController@createItem', 'as' => 'item.create'));
	Route::post('/create', array('uses'=> 'ItemsController@create', 'as' => 'item.create'));

	Route::get('/edit/{item_name}', array('uses' => 'ItemsController@edit', 'as' => 'page.item.edit'));
	Route::post('/update/{item_name}', array('uses' => 'ItemsController@update', 'as' => 'item.update'));
	
	Route::get('', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
	Route::get('/list', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
	Route::get('/{itemName}', array('uses' => 'ItemsController@show', 'as' => 'item.find'));
	
	Route::get('/category/{category}', array('uses' => 'ItemsController@showCategory', 'as' => 'itemIndex'));

	Route::get('/views/max', array('uses'=> 'ItemsController@viewMax', 'as' => 'item.viewMax'));
	Route::post('/search', array('uses'=> 'ItemsController@search', 'as' => 'item.search'));
	Route::post('/delete/{itemName}', array('uses'=> 'ItemsController@destroy', 'as' => 'item.delete'));
	Route::post('/buy/{itemName}', array('uses'=> 'ItemsController@buy', 'as' => 'item.buy'));
});