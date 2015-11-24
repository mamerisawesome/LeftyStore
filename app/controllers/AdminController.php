<?php

class AdminController extends \BaseController {

	public function approvePage()
	{
		$users = DB::select('select * from for_approval');
		return View::make('pages.admin.approval')
			->with('users',$users);
	}
	
	public function approve($username)
	{
		$user = DB::select("select * from for_approval where username = '" . $username ."'");
		$userProfile = DB::select("select * from for_approval_profile where profile_username = '" . $username ."'");
		$userInterests = DB::select("select * from for_approval_profile_interest where profile_id = '" . $userProfile[0]->profile_id ."'");
		$customer = DB::insert('insert into users '
			."(bank_acct_no, username, password, "
			."first_name, middle_name, last_name, address, approved_by, approval_date) values ('"
				.$user[0]->bank_acct_no		."','"
				.$user[0]->username		."','"
				.$user[0]->password		."','"
				.$user[0]->first_name		."','"
				.$user[0]->middle_name		."','"
				.$user[0]->last_name		."','"
				.$user[0]->address			."','"
				.Session::get('username')	."',"
				."NOW()) "
			);
		$profile = DB::insert('insert into profiles '
			."(profile_username, birthday, age) values ('"
				.$userProfile[0]->profile_username	."','"
				.$userProfile[0]->birthday	."','"
				.$userProfile[0]->age		."')"
			);
		foreach($userInterests as $interest){
			$profileInterests = DB::insert('insert into profile_interests '
				."(profile_id, interest) values ("
					."(select distinct profile_id from profiles "
					."where profile_username = '".$username."'),'"
					.$interest->interest."')"
				);
		}
		
		DB::delete("delete from for_approval_profile_interest where profile_id = '".$userProfile[0]->profile_id."'");
		DB::delete("delete from for_approval_profile where profile_username = '".$username."'");
		DB::delete("delete from for_approval where username = '".$username."'");
		
		return Redirect::to('/admin/approve');
	}
	
	public function disapprove($username){
		$user = DB::select("select * from for_approval where username = '" . $username ."'");
		$userProfile = DB::select("select * from for_approval_profile where profile_username = '" . $username ."'");
		$userInterests = DB::select("select * from for_approval_profile_interest where profile_id = '" . $userProfile[0]->profile_id ."'");
		
		DB::delete("delete from for_approval_profile_interest where profile_id = '".$userProfile[0]->profile_id."'");
		DB::delete("delete from for_approval_profile where profile_username = '".$username."'");
		DB::delete("delete from for_approval where username = '".$username."'");
		
		return Redirect::to('/admin/approve');
	}

}
