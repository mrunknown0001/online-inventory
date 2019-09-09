<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecyController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.specy.index');
    }
}
