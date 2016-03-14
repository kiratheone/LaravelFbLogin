<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
class Home extends Controller
{
    public function index()
    {
    	$user = Socialite::driver('facebook')->user();
    	dd($user);
    }
}
