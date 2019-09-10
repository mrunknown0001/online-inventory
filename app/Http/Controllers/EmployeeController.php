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
}
