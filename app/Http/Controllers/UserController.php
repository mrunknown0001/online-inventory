<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Index for user management
     */
    public function index()
    {
    	return view('admin.user.index');
    }
}
