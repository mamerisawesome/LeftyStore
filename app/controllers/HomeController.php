<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $user;

    public function __construct(User $user)
	{
        $this->user = $user;
    }
	
	public function showWelcome()
	{
		return View::make('pages.home');
	}

	public function showHomepage(){
		$users = DB::select('select * from users');
//		if(DB::table('users')->count() = 0){
//			$users->username = "mamerisawesome";
//			$users->password = "123";
//		}
//		dd($users);
		return View::make('pages.user.index')->with('users',$users);
	}
}
