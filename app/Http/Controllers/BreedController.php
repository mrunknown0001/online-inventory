<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.breed.index');
    }


    /**
     * all breeds
     */
    public function all()
    {
    	$data = [
    		'breed' => NULL,
    		'animal' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
