<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Index 
     */
    public function index()
    {
    	return view('admin.supplier.index');
    }




    /**
     * Add 
     */
    public function addSupplier()
    {
    	return view('admin.supplier.add-edit', ['id' => NULL, 'supplier' => NULL]);
    }



    /**
     * store supplier
     */
    public function storeSupplier(Request $request)
    {
    	$request->validate([
    		'supplier' => 'required',
    		'address' => 'required',
    		'note' => 'nullable',
    	]);

    	$supplier = $request['supplier'];
    	$address = $request['address'];
    	$note = $request['note'];

    	$new = new Supplier();

    	$new->supplier_name = $supplier;
    	$new->address = $address;
    	$new->note = $note;

    	if($new->save()) {
    		return redirect()->route('add.supplier')->with('success', 'Supplier Saved!');
    	}
    }



    /**
     * All Suppliers
     */
    public function all()
    {
    	$data = [
    		'supplier' => NULL,
    		'address' => NULL,
    		'action' => NULL,
    	];


    	return $data;
    }
}
