<?php

class LoginController extends \BaseController {
	
	protected $user;

    public function __construct(User $user)
	{
        $this->user = $user;
    }
	
}
