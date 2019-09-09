<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangay;

class BarangayController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.barangay.index');
    }



    /**
     * All Barnagays
     */
    public function all()
    {
    	$data = [
    		'barangay' => NULL,
    		'municipality' => NULL,
    		'action' => NULL,
    	];

    	// get all active barangays
    	$barangays = Barangay::whereActive(1)->get();

    	// format data
    	if(count($barangays) > 0) {
    		$data = NULL;
    		foreach($barangays as $b) {
    			$data[] = [
    				'barangay' => $b->name,
    				'municipality' => $b->municipality->name,
    				'action' => "<button class='btn btn-primary btn-xs'>View</button>",
    			];
    		}
    	}

    	return $data;
    }
}
