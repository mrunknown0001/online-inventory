<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.animal.index');
    }



    /**
     * All Animals
     */
    public function all()
    {
    	$data = [
    		'animal' => NULL,
    		'species' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
