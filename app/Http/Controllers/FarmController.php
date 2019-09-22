<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.farm.index');
    }


    /**
     * all farms
     */
    public function all()
    {
    	$data = [
    		'name' => NULL,
    		'description' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
