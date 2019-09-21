<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * index
     */
    public function index()
    {
    	return view('admin.item.index');
    }



    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'item' => NULL,
    		'code' => NULL,
    		'quantity' => NULL,
    		'unit_of_measurement' => NULL,
    		'category' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
