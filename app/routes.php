
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

//Route::get('/test', array('uses' => 'TestController@show', 'as' => 'pages.test'));
Route::get('/', array('uses' => 'HomeController@showWelcome', 'as' => 'index'));
Route::get('/home', array('uses' => 'HomeController@showWelcome', 'as' => 'home'));
//Route::post('/', array('uses'=> 'HomeController@showWelcome', 'as' => 'index'));

Route::get('/signupPage', array('uses' => 'LoginController@signupPage', 'as' => 'signupPage'));

Route::post('/signup', array('uses'=> 'LoginController@create', 'as' => 'signup'));
//Route::post('/login', array('uses'=> 'GeneralController@login', 'as' => 'login'));

Route::get('/item/create', array('uses' => 'ItemsController@createItem', 'as' => 'item.create'));
Route::get('/item/index', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
Route::get('/item', array('uses' => 'ItemsController@showItems', 'as' => 'itemIndex'));
Route::get('/item/{itemName}', array('uses' => 'ItemsController@show', 'as' => 'itemFind'));

Route::post('/item/create', array('uses'=> 'ItemsController@create', 'as' => 'createItem'));
Route::post('/item/search', array('uses'=> 'ItemsController@search', 'as' => 'searchItem'));
Route::post('/item/delete/{itemName}', array('uses'=> 'ItemsController@destroy', 'as' => 'deleteItem'));