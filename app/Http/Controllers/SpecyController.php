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



    /**
     * all species
     */
    public function all()
    {
    	$data = [
    		'specy' => NULL,
    		'details' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
