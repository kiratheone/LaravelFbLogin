<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginFB extends Controller
{
    //
	public function index()
	{
		if (Auth::check()) {
			return redirect('home');
		} else {
		  return view('LoginFbView');
		} 
	}

}
