<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * all 
     */
    public function all()
    {
    	$data = [
    		'unit' => NULL,
    		'code' => NULL,
    		'action' => NULL,
    	];


    	return $data;
    }
}
