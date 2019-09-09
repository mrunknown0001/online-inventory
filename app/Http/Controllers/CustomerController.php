<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Customer Controller
     */
    public function index()
    {
    	return view('admin.customer.index');
    }




    /**
     * all customers
     */
    public function all()
    {
    	$data = [
    		'customer' => NULL,
    		'details' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
