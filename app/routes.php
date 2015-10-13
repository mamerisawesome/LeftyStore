
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
Route::get('/home', array('uses' => 'HomeController@showHomepage', 'as' => 'home'));
//Route::post('/', array('uses'=> 'HomeController@showWelcome', 'as' => 'index'));

Route::post('/login', array('uses'=> 'LoginController@login', 'as' => 'login'));
//Route::post('/login', array('uses'=> 'GeneralController@login', 'as' => 'login'));