<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /**
     * Login method showing login page
     */
    public function login()
    {
    	return view('login');
    }


    /**
     * Post Loging Method use to login authenticated users
     */
    public function postLogin(Request $request)
    {
    	$request->validate([
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	$username = $request['username'];
    	$password = $request['password'];

    	if(Auth::attempt(['username' => $username, 'password' => $password])) {
    		return redirect()->route('admin.dashboard');
    	}
    	else {
    		return 'Authentication Failed!';
    	}
    }



    /**
     * logout Method
     */
    public function logout()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }
}
