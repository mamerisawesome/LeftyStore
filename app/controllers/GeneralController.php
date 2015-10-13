<?php
/**
 * Created by PhpStorm.
 * User: Almer
 * Date: 4/3/2015
 * Time: 6:46 PM
 */

class GeneralController extends BaseController{
    /*
	|--------------------------------------------------------------------------
	| General Controller
	|--------------------------------------------------------------------------
	|
	|   This is a controller for all the webpages.
	|
	|	Route::get('/pages', 'GeneralController@showContent');
	|
	*/

    public function show($somePage)
    {
        return View::make($somePage);
    }

    public function login(){
        
    }

}