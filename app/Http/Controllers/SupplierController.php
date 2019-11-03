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
     * viewSupplier
     */
    public function viewSupplier($id = NULL)
    {
        $id = $this->decryptString($id);

        $supplier = \App\Supplier::findorfail($id);

        return view('admin.supplier.view', ['supplier' => $supplier]);
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

    	$suppliers = Supplier::where('active', 1)->get();

    	if(count($suppliers) > 0) {
    		$data = NULL;

    		foreach($suppliers as $s) {
    			$data[] = [
    				'supplier' => $s->supplier_name,
    				'address' => $s->address,
    				'action' => "<button class='btn btn-primary btn-xs' id='view' data-id='" . encrypt($s->supplier_id) . "'><i class='fa fa-eye'></i> View</button>",
    			];
    		}
    	}

    	return $data;
    }
}
