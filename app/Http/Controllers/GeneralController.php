<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AuditTrail;


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

        // get latest 10 images in activities
        $images = \App\PreviousActivity::orderBy('created_at', 'desc')->take(10)->get();


    	return view('welcome', ['images' => $images]);
    }





    /**
     * Audit Trail method
     */
    public static function log($details)
    {
        $user = Auth::user();


        $log = new AuditTrail();

        $log->user_id = $user->user_id;
        $log->details = $details;
        $log->save();
    }


}
