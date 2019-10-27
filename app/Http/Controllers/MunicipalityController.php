<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;

class MunicipalityController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.municipality.index');
    }




    /**
     * municipalityInfo method
     */
    public function municipalityInfo($id = null)
    {
    	$id = $this->decryptString($id);

    	$municipality = Municipality::findorfail($id);

    	return view('admin.municipality.view', ['municipality' => $municipality]);
    }


    /**
     * Municipality Item Count
     */
    public function viewItemCount($id = NULL)
    {
        $id = $this->decryptString($id);

        $municipality = \App\Municipality::findorfail($id);

        $items = \App\ItemMunicipality::where('municipality_id', $municipality->municipality_id)->get();

        return view('admin.municipality.view-item-count', ['items' => $items, 'municipality' => $municipality]);
    }


    /**
     * All records 
     */
    public function all()
    {
    	$data = [
    		'name' => NULL,
    		'barangays' => NULL,
    		'action' => NULL,
    	];


    	// get all active records
    	$municipalities = Municipality::whereActive(1)->get();

    	// format $data
    	if(count($municipalities)) {
    		$data = NULL;
    		foreach($municipalities as $m) {
    			$data[] = [
    				'name' => $m->name,
    				'barangays' => $m->barangays->count(),
    				'action' => "<button class='btn btn-primary btn-xs'id='view' data-id='" . encrypt($m->municipality_id) . "'><i class='fa fa-eye'></i> View</button> <button class='btn btn-info btn-xs' id='item' data-id='" . encrypt($m->municipality_id) . "'><i class='fa fa-list'></i> Items</button>"
    			];
    		}
    	}


    	return $data;
    }
}
