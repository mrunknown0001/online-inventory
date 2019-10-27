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
     * viewItemCount
     */
    public function viewItemCount($id = NULL)
    {
        $id = $this->decryptString($id);
        $barangay = Barangay::findorfail($id);

        $items = \App\ItemBarangay::where('barangay_id', $barangay->barangay_id)->get();

        return view('admin.barangay.view-item-count', ['barangay' => $barangay, 'items' => $items]);
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
    				'action' => "<button class='btn btn-primary btn-xs' id='item' data-id='" . encrypt($b->barangay_id) . "'><i class='fa fa-list'></i> Items</button>",
    			];
    		}
    	}

    	return $data;
    }
}
