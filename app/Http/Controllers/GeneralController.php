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


    	return view('welcome');
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
