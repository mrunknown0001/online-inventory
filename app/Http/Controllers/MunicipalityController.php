<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.municipality.index');
    }
}
