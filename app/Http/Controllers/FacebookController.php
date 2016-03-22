<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use App\User;
Use Auth;

class FacebookController extends Controller
{
    public function login()
	{
	    return Socialite::driver('facebook')->redirect();
	}

	public function callback()
	{
	    $user = Socialite::driver('facebook')->user();
	    //User::create(['name'=>$user->getName(), 'email'=>$user->getEmail()]);
	    $userCheck = User::whereEmail([$user->getEmail()])->first();
	    // dd($userCheck);
	    if ($userCheck) {
	    	Auth::login($userCheck);
	    	return redirect('home');
	    } else {
	    	$user = User::create(['name'=>$user->getName(), 'email'=>$user->getEmail()]);
	    	Auth::login($user);
	    	return redirect('home');
	    }
	}
}
