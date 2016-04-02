<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use App\User;
Use Auth;
use Exception;

class FacebookController extends Controller
{
    public function login()
	{
	    return Socialite::driver('facebook')->redirect();
	}

	public function callback()
	{
	    try {
	    	$user = Socialite::driver('facebook')->user();
	    	//User::create(['name'=>$user->getName(), 'email'=>$user->getEmail()]);
		    $userCheck = User::whereId_fb([$user->getId()])->first();
		    // dd($userCheck);
		    // dd($user);
		    if ($userCheck) {
		    	Auth::login($userCheck);
		    	return redirect('home');
		    } else {
		    	$createUser =  User::create([
			            'id_fb' => $user->getId(),
			            'name' => $user->getName(),
			            'email' => $user->getEmail(),
			            'user_fb_token' => $user->token,
			            'avatar_url' => $user->getAvatar()]);

		    	Auth::login($createUser);
		    	return redirect('home');
		    }	
	    } catch (Exception $e) {
	    	dd($e);
	    	return  "Something happend, i dont know why";
	    }
	    
	}
}
