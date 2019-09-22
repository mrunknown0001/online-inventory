<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicInfoController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('common.public_info.index');
    }


    /**
     * all public information
     */
    public function all()
    {
    	$data = [
    		'info' => NULL,
    		'details' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
