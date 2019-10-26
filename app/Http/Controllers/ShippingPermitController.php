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
     * Set starting shipping number
     */
    public function setStartingNumber()
    {
        // check if the starting number is already 
        $check = \App\ShippingPermitStart::where('active', 1)->first();

        if(!empty($check)) {
            return redirect()->route('shipping.permits')->with('error', 'Shipping Number Already Set!');
        }

        return view('common.shipping_permit.set-starting-shipping-no');
    }


    /**
     * save starting number saveStartShippingNumber
     */
    public function saveStartShippingNumber(Request $request)
    {
        $request->validate([
            'starting_number' => 'required',
        ]);

        $number = $request['starting_number'];

        $start = new \App\ShippingPermitStart();
        $start->start = $number;
        if($start->save()) {
            return redirect()->route('shipping.permits')->with('success', 'Shipping Start Number Saved!');
        }
    }


    /**
     * Add addShippingPermit
     */
    public function addShippingPermit()
    {

        $farms = \App\Farm::where('active', 1)->get();


        return view('common.shipping_permit.add-edit', ['id' => NULL, 'farms' => $farms]);
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
