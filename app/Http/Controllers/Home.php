<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use Exception;
class Home extends Controller
{
    public function index()
    {
    	try {
    		$user = Socialite::driver('facebook')->user();
    		dd($user);
    	} catch (Exception $e) {
    		return "ohh meeen. you cannot doing this";
    	}    	
    }
}
