<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Dashboard
     */
    public function dashboard()
    {
    	return view('common.dashboard2');
    }


    /**
     * Employee Profile
     */
    public function profile()
    {
    	return 'return view for employee profile';
    }
}
