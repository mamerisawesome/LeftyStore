<?php

class UserController extends \BaseController {

	protected $user;

    public function __construct(User $user)
	{
        $this->user = $user;
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = DB::select('select * from users');
		return View::make('pages.user.index')->with('users',$users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$this->user->firstName 			= Input::get('first_name');
		$this->user->middleName 		= Input::get('middle_name');
		$this->user->lastName 			= Input::get('last_name');
		$this->user->bankAcctNo 		= Input::get('bank_acct_no');
		$this->user->username 			= Input::get('username');
		$this->user->password 			= Hash::make(Input::get('password'));
		$this->user->retypePassword 	= Hash::make(Input::get('retype_password'));
		$this->user->address 			= Input::get('address');
		$this->user->approvedBy 		= "Admin";
		$this->user->avatar 			= Input::get('avatar');
		$this->user->avatarPath			= Input::get('avatarPath');
		dd($this->user);
		
//		dd($this->user);
		if($this->user->password == $this->user->password){
			$customer = DB::insert('insert into users '
			    ."(bank_acct_no, username, password, "
			    ."first_name, middle_name, last_name, address, approved_by) values ('"
					.$this->user->bankAcctNo	."','"
					.$this->user->username		."','"
					.$this->user->password		."','"
					.$this->user->firstName		."','"
					.$this->user->middleName	."','"
					.$this->user->lastName		."','"
					.$this->user->address		."','"
					.$this->user->approvedBy	."') "
				);
			return Redirect::to('/home');
		} else return View::make('pages.login.signupPage');
	}
	
	public function signupPage(){
		return View::make('pages.login.signupPage');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userName)
	{
		$userRes = DB::select("select * from users where username like '".$userName."'");
		if(sizeof($userRes)){
			$itemRes = DB::select("select * from items where posted_by like '".$userName."'");
			return View::make('pages.user.profile')->with(array('items'=>$itemRes,'user'=>$userRes[0]));
		} else {
			return Redirect::to('/');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
