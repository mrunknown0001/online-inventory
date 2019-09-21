<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UnitOfMeasurement;

class UnitOfMeasurementController extends Controller
{
    /**
     * index
     */
    public function index()
    {
    	return view('admin.unit_of_measurement.index');
    }


    /**
     * add unit of measurement
     */
    public function addUnitOfMeasurement()
    {
    	return view('admin.unit_of_measurement.add-edit', ['id' => NULL, 'unit' => NULL]);
    }



    /**
     * storeUnitofMeasurement method
     */
    public function storeUnitofMeasurement(Request $request)
    {
    	$request->validate([
    		'unit_of_measurement' => 'required',
    		'code' => 'required',
    	]);

    	$unit = $request['unit_of_measurement'];
    	$code = $request['code'];

    	$u = new UnitOfMeasurement();

    	$u->name = $unit;
    	$u->code = $code;

    	if($u->save()) {
    		return redirect()->route('add.unit.of.measurement')->with('success', 'Unit of Measurement Saved!');
    	}
    }


    /**
     * all 
     */
    public function all()
    {
    	$data = [
    		'unit' => NULL,
    		'code' => NULL,
    		'action' => NULL,
    	];

    	$units = UnitOfMeasurement::where('active', 1)->get();

    	if(count($units) > 0) {
    		$data = NULL;

    		foreach($units as $u) {
    			$data[] = [
    				'unit' => $u->name,
    				'code' => $u->code,
    				'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>"
    			];
    		}
    	}

    	return $data;
    }
}
