<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Inventory;

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
        $item->unit_of_measurement_id = $this->decryptString($unit_of_measurement1);
        $item->price = $price1;

        // add item
        // check if existing (add quantity), and add new if not
        $check_inv = Inventory::where('item_id', $this->decryptString($item1))->where('unit_of_measurement_id', $this->decryptString($unit_of_measurement1))->first();

        if(empty($check_inv)) {
            // create new
            $inv = new Inventory();
            $inv->item_id = $this->decryptString($item1);
            $inv->unit_of_measurement_id = $this->decryptString($unit_of_measurement1);
            $inv->quantity = $item->quantity;
            $inv->save();
        }
        else {
            // add
            $check_inv->quantity += $item->quantity;
            $check_inv->save();
        }

        $item->save();


        // item 2 (optional)
        if($item2 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item2);
            $item->quantity = $quantity2;
            $item->unit_of_measurement_id = $this->decryptString($unit_of_measurement2);
            $item->price = $price3;

            // add item
            // check if existing (add quantity), and add new if not
            $check_inv = Inventory::where('item_id', $this->decryptString($item2))->where('unit_of_measurement_id', $this->decryptString($unit_of_measurement2))->first();

            if(empty($check_inv)) {
                // create new
                $inv = new Inventory();
                $inv->item_id = $this->decryptString($item2);
                $inv->unit_of_measurement_id = $this->decryptString($unit_of_measurement2);
                $inv->quantity = $item->quantity;
                $inv->save();
            }
            else {
                // add
                $check_inv->quantity += $item->quantity;
                $check_inv->save();
            }

            $item->save();

        }
        
        // item 3 (optional)
        if($item3 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item3);
            $item->quantity = $quantity3;
            $item->unit_of_measurement_id = $this->decryptString($unit_of_measurement3);
            $item->price = $price3;

            // add item
            // check if existing (add quantity), and add new if not
            $check_inv = Inventory::where('item_id', $this->decryptString($item3))->where('unit_of_measurement_id', $this->decryptString($unit_of_measurement3))->first();

            if(empty($check_inv)) {
                // create new
                $inv = new Inventory();
                $inv->item_id = $this->decryptString($item3);
                $inv->unit_of_measurement_id = $this->decryptString($unit_of_measurement3);
                $inv->quantity = $item->quantity;
                $inv->save();
            }
            else {
                // add
                $check_inv->quantity += $item->quantity;
                $check_inv->save();
            }

            $item->save();

        }

        // item 4 (optional)
        if($item4 != NULL) {
            $item = new Transaction();
            $item->supplier = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item4);
            $item->quantity = $quantity4;
            $item->unit_of_measurement_id = $this->decryptString($unit_of_measurement4);
            $item->price = $price4;

            // add item
            // check if existing (add quantity), and add new if not
            $check_inv = Inventory::where('item_id', $this->decryptString($item4))->where('unit_of_measurement_id', $this->decryptString($unit_of_measurement4))->first();

            if(empty($check_inv)) {
                // create new
                $inv = new Inventory();
                $inv->item_id = $this->decryptString($item4);
                $inv->unit_of_measurement_id = $this->decryptString($unit_of_measurement4);
                $inv->quantity = $item->quantity;
                $inv->save();
            }
            else {
                // add
                $check_inv->quantity += $item->quantity;
                $check_inv->save();
            }


            $item->save();

        }

        // item 5 (optional)
        if($item5 != NULL) {
            $item = new Transaction();
            $item->supplier_id = $this->decryptString($supplier);
            $item->reference_number = $reference_number;
            $item->item_id = $this->decryptString($item5);
            $item->quantity = $quantity5;
            $item->unit_of_measurement_id = $this->decryptString($unit_of_measurement5);
            $item->price = $price5;

            // add item
            // check if existing (add quantity), and add new if not
            $check_inv = Inventory::where('item_id', $this->decryptString($item5))->where('unit_of_measurement_id', $this->decryptString($unit_of_measurement5))->first();

            if(empty($check_inv)) {
                // create new
                $inv = new Inventory();
                $inv->item_id = $this->decryptString($item5);
                $inv->unit_of_measurement_id = $this->decryptString($unit_of_measurement5);
                $inv->quantity = $item->quantity;
                $inv->save();
            }
            else {
                // add
                $check_inv->quantity += $item->quantity;
                $check_inv->save();
            }


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

        $items = \App\Inventory::get();

        if(count($items) > 0) {
            $data = NULL;

            foreach($items as $i) {
                $data[] = [
                    'item' => $i->item->item_name,
                    'code' => $i->item->item_code,
                    'unit' => $i->unit->code,
                    'quantity' => $i->quantity,
                    'category' => $i->item->category->item_category_name,
                    'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>",
                ];
            }
        }

    	return $data;
    }
}
