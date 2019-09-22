<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingPermitController extends Controller
{
    /**
     * index
     */
    public function index()
    {
    	return view('common.shipping_permit.index');
    }


    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'permit_no' => NULL,
    		'origin' => NULL,
    		'destination' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
