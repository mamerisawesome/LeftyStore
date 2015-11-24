<?php

class SessionController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
        return View::make('pages.login.loginPage');
	}

	public function search(){
		$req = Input::get('itemSearch');
		$itemRes = DB::select("select * from items where lower(item_name) like '%".strtolower($req)."%'");
		$userRes = DB::select("select * from users "
							  ."where lower(username) like '%".strtolower($req)."%' "
							 );
	
		return View::make('pages.searchResult')
			->with(array('items'=>$itemRes,'users'=>$userRes));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function start(){
		$data = Input::all();
		$validator = Validator::make($data, User::$rules);
		if ($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){
			Session::put('id',Auth::user()->id);
			Session::put('username',Auth::user()->username);
			Session::put('firstName',Auth::user()->firstName);
			Session::put('middleName',Auth::user()->middleName);
			Session::put('lastName',Auth::user()->lastName);
			Session::put('address',Auth::user()->address);
			Session::put('isLogged',true);
			$isAdmin = DB::select("select administrators.admin_username from administrators where administrators.admin_username = '".Session::get('username') ."'");
			if(sizeof($isAdmin) != 0){
				Session::put('isAdmin',true);
			}
			
			return Redirect::intended('/');
		}else{
			return Redirect::back();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(){
		Session::flush();
		return Redirect::to('/');
	}


}
