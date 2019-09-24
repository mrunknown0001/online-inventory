<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

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
        $request->validate([
            'supplier' => 'required',
            'reference_number' => 'required',
            'item1' => 'required',
            'quantity1' => 'required',
            'unit_of_measurement1' => 'required',
            'price1' => 'required',
        ]);


        $supplier = $request['supplier'];
        $reference_number = $request['reference_number'];

        $item1 = $request['item1'];
        $quantity1 = $request['quantity1'];
        $unit_of_measurement1 = $request['unit_of_measurement1'];
        $price1 = $request['price1'];

        $item2 = $request['item2'];
        $quantity2 = $request['quantity2'];
        $unit_of_measurement2 = $request['unit_of_measurement2'];
        $price2 = $request['price2'];

        $item3 = $request['item3'];
        $quantity2 = $request['quantity3'];
        $unit_of_measurement3 = $request['unit_of_measurement3'];
        $price3 = $request['price3'];

        $item4 = $request['item4'];
        $quantity4 = $request['quantity4'];
        $unit_of_measurement4 = $request['unit_of_measurement4'];
        $price4 = $request['price4'];

        $item5 = $request['item5'];
        $quantity5 = $request['quantity5'];
        $unit_of_measurement5 = $request['unit_of_measurement5'];
        $price5 = $request['price5'];


        // item 1
        $item = new Transaction();
        $item->supplier_id = $this->decryptString($supplier);
        $item->reference_number = $reference_number;
        $item->item_id = $this->decryptString($item1);
        $item->quantity = $quantity1;
        $item->price = $price1;
        $item->save();


        // item 2 (optional)
        if($item2 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item2);
            $item->quantity = $quantity2;
            $item->price = $price3;
            $item->save();   
        }
        
        // item 3 (optional)
        if($item3 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item3);
            $item->quantity = $quantity3;
            $item->price = $price3;
            $item->save();   
        }

        // item 4 (optional)
        if($item4 != NULL) {
            $item = new Transaction();
            $item->supplier = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item4);
            $item->quantity = $quantity4;
            $item->price = $price4;
            $item->save();   
        }

        // item 5 (optional)
        if($item5 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item5);
            $item->quantity = $quantity5;
            $item->price = $price5;
            $item->save();   
        }

        return redirect()->route('item.entry')->with('success', 'Entry Save!');

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
