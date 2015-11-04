<?php

class LoginController extends \BaseController {
	
	protected $user;

    public function __construct(User $user)
	{
        $this->user = $user;
    }
	
	public function create(){
		$this->user->firstName = Input::get('first_name');
		$this->user->middleName = Input::get('middle_name');
		$this->user->lastName = Input::get('last_name');
		$this->user->bankAcctNo = Input::get('bank_acct_no');
		$this->user->username = Input::get('username');
		$this->user->password = Hash::make(Input::get('password'));
		$this->user->retypePassword = Hash::make(Input::get('retype_password'));
		$this->user->address = Input::get('address');
		$this->user->approvedBy = "Admin";

//		dd($this->user);
		if($this->user->password == $this->user->password){
			$customer = DB::insert('insert into users '
			    ."(bank_acct_no, username, password, "
			    ."first_name, middle_name, last_name, address, approved_by) values ('"
					.$this->user->bankAcctNo."','"
					.$this->user->username."','"
					.$this->user->password."','"
					.$this->user->firstName."','"
					.$this->user->middleName."','"
					.$this->user->lastName."','"
					.$this->user->address."','"
					.$this->user->approvedBy."')");
			return Redirect::to('/home');
		} else return View::make('pages.login.signupPage');
	}
	
	public function signupPage(){
		return View::make('pages.login.signupPage');
	}
}