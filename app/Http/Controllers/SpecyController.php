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
     * Add Species
     */
    public function addSpecies()
    {
        return view('admin.specy.add-edit');
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
