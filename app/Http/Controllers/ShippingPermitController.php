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
     * Add addShippingPermit
     */
    public function addShippingPermit()
    {

        $farms = \App\Farm::where('active', 1)->get();

        $suppliers = \App\Supplier::where('active', 1)->get();


        return view('common.shipping_permit.add-edit', ['id' => NULL, 'farms' => $farms, 'suppliers' => $suppliers]);
    }


    /**
     * store
     */
    public function postAddShippingPermit(Request $request)
    {
        return $request;
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
