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
}
