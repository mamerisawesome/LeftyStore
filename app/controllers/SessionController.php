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
