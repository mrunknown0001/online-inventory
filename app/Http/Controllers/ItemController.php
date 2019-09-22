<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * index
     */
    public function index()
    {
    	return view('admin.item.index');
    }


    /**
     * Add Item
     */
    public function addItem()
    {
        // category
        $categories = \App\ItemCategory::where('active', 1)->get();
        // units
        $units = \App\UnitOfMeasurement::where('active', 1)->get();

        return view('admin.item.add-edit', ['id' => NULL, 'item' => NULL, 'categories' => $categories, 'units' => $units]);
    }



    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'item' => NULL,
    		'code' => NULL,
    		'quantity' => NULL,
    		'unit_of_measurement' => NULL,
    		'category' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
