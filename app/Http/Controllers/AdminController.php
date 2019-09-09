<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
    	$count = \App\User::count();

    	return view('common.dashboard', ['count' => $count]);
    }



    /**
     * Audit Trail 
     */
    public function auditTrail()
    {
    	return view('admin.audit_trail.index');
    }


    /**
     * All logs
     */
    public function logs()
    {
    	$data = [
    		'user' => NULL,
    		'action' => NULL,
    		'date_time' => NULL,
    	];

    	// return all logs


    	return $data;
    }
}
