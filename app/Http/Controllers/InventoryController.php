<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Index of inventory
     */
    public function index()
    {
    	return view('employee.inventory.index');
    }


    /**
     * Item Entry
     */
    public function itemEntry()
    {
    	$items = \App\Item::where('active', 1)->get();
    	$suppliers = \App\Supplier::where('active', 1)->get();
    	$units = \App\UnitOfMeasurement::where('active', 1)->get();

    	return view('employee.inventory.entry', ['suppliers' => $suppliers, 'units' => $units, 'items' => $items]);
    }



    /**
     * store
     * TRANSACTION TYPE 1
     */
    public function storeItemEntry(Request $request)
    {
        return $request;
    }


    /**
     * STORE 
     * TRANSACTION TYPE 2
     */


    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'item' => NULL,
    		'code' => NULL,
    		'unit' => NULL,
    		'quantity' => NULL,
    		'category' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
