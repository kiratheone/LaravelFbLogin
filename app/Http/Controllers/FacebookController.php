<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class FacebookController extends Controller
{
    public function login()
	{
	    return Socialite::driver('facebook')->redirect();
	}

	public function callback()
	{
	    $user = Socialite::driver('facebook')->user();
	}
}
