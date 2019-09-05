<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GeneralController extends Controller
{
    /**
     * Landing Page
     */
    public function landingPage()
    {
    	if(Auth::check()) {
    		if(Auth::user()->user_type == 1) {
    			return redirect()->route('admin.dashboard');
    		}
    		else {
    			return redirect()->route('emp.dashboard');
    		}
    	} 


    	return view('welcome');
    }
}
