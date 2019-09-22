<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Index of inventory
     */
    public function index()
    {
    	return view('employee.inventory.index');
    }


    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'item' => NULL,
    		'code' => NULL,
    		'unit' => NULL,
    		'quantity' => NULL,
    		'category' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
