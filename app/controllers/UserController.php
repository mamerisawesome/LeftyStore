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
		$this->user->birthday 			= Input::get('birthday');
		$this->user->age 				= Input::get('age');
		$this->user->approvedBy 		= "Admin";
		$this->user->avatar 			= Input::get('avatar');
		$this->user->avatarPath			= Input::get('avatarPath');
		
		if($this->user->password == $this->user->password){
			$customer = DB::insert('insert into for_approval '
			    ."(bank_acct_no, username, password, "
			    ."first_name, middle_name, last_name, address, approved_by) values ('"
					.$this->user->bankAcctNo	."','"
					.$this->user->username		."','"
					.$this->user->password		."','"
					.$this->user->firstName		."','"
					.$this->user->middleName	."','"
					.$this->user->lastName		."','"
					.$this->user->address		."','"
					.null	."') "
				);
			$profile = DB::insert('insert into for_approval_profile '
			    ."(profile_username, birthday, age) values ('"
					.$this->user->username	."','"
					.$this->user->birthday	."','"
					.$this->user->age		."')"
				);
			for($x = 1; $x <= Input::get('interestNo'); $x += 1){
				$profileInterests = DB::insert('insert into for_approval_profile_interest '
					."(profile_id, interest) values ("
						."(select distinct profile_id from for_approval_profile "
						."where profile_username = '".$this->user->username."'),'"
						.Input::get('interest'.$x)."')"
					);
			}
			return Redirect::to('/');
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
			$userProfRes = DB::select("select * from profiles where profile_username like '".$userName."'");
			$userProfInterestsRes = DB::select("select * from profile_interests where ".
									"profile_id = ".
									"(select distinct profile_id from profiles where profile_username = '".$userName."')");
			$itemRes = DB::select("select * from items where posted_by like '".$userName."'");
			return View::make('pages.user.profile')
				->with(
					array(
						'items'=>$itemRes,
						'user'=>$userRes[0],
						'profile'=>$userProfRes[0],
						'interests'=>$userProfInterestsRes
					));
		} else if($userName != 'login' && $userName != 'signup' && sizeof($userRes) == 0) {
			return Redirect::to('/');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username)
	{
		$userRes = DB::select("select * from users where username like '".$username."'");
		$userProfRes = DB::select("select * from profiles where profile_username like '".$username."'");
		$userProfInterestsRes = DB::select("select * from profile_interests where ".
								"profile_id = ".
								"(select distinct profile_id from profiles where profile_username = '".$username."')");
		$itemRes = DB::select("select * from items where posted_by like '".$username."'");
		return View::make('pages.user.edit')
			->with(
				array(
					'items'=>$itemRes,
					'user'=>$userRes[0],
					'profile'=>$userProfRes[0],
					'interests'=>$userProfInterestsRes
				));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username)
	{
		if(Input::get('password') == Input::get('retype_password')){
			DB::update('update users set '
					   ."username = '".Input::get('username')."', "
					   ."password = '".Hash::make(Input::get('password'))."', "

					   ."first_name = '".Input::get('first_name')."', "
					   ."middle_name = '".Input::get('middle_name')."', "
					   ."last_name = '".Input::get('last_name')."', "

					   ."address = '"	.Input::get('address')	."' "
					   ."where username = '" . $username ."'"
			);
			
			DB::update('update profiles set '
					   ."profile_username = '".Input::get('username')."', "
					   ."birthday = '".Input::get('birthday')."', "
					   ."age = '"	.Input::get('age')	."' "
					   ."where profile_username = '" . $username ."'"
			);			
			
			DB::delete("delete from profile_interests where profile_id = "."(select profile_id from profiles where profile_username = '".$username."')");
			
			for($x = 1 ; $x < Input::get('interestNo') + 1; $x+=1){
				DB::insert('insert into profile_interests(profile_id, interest) values( '
						   ."(select profile_id from profiles where profile_username = '".Input::get('username')."')".", "
						   ."'".Input::get('interest'.$x)."') "
				);
			}

			Session::put('username',Input::get('username'));
			Session::put('firstName',Input::get('firstName'));
			Session::put('middleName',Input::get('middleName'));
			Session::put('lastName',Input::get('lastName'));
			Session::put('address',Input::get('address'));
		}

		return Redirect::to('/user/'.Input::get('username'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($username)
	{
		DB::delete("delete from profile_interests where profile_id = "
				   ."(select profile_id from profiles where profile_username = '".$username."')");
		DB::delete("delete from profiles where profile_username = '".$username."'");
		DB::delete("delete from users where username = '".$username."'");
		
		return Redirect::to('/');
	}


}
