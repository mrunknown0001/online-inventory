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
        // check if there is an existing active session
        // redirect to the user's dashboard
        if(Auth::check()) {
            return $this->auth_check();
        }
        
    	return view('login');
    }


    /**
     * Post Loging Method use to login authenticated users
     */
    public function postLogin(Request $request)
    {
        // check if there is an existing active session
        // redirect to the user's dashboard
        if(Auth::check()) {
            return $this->auth_check();
        }

    	$request->validate([
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	$username = $request['username'];
    	$password = $request['password'];

    	if(Auth::attempt(['username' => $username, 'password' => $password])) {
    		return $this->auth_check();
    	}
    	else {
    		return redirect()->route('login')->with('error', 'Invalid Username or Password!');
    	}
    }



    /**
     * logout Method
     */
    public function logout()
    {
    	Auth::logout();

    	return redirect()->route('login')->with('success', 'Logout Successfully!');
    }




    /*************************
    * Miscelleneous function *
    * ***********************/

    /**
     * check auth if what user
     */
    public function auth_check()
    {
        if(Auth::user()->user_type == 1) {
            return redirect()->route('admin.dashboard');
        }
        else if(Auth::user()->user_type == 2) {
            return redirect()->route('emp.dashboard');
        }
    }
}
