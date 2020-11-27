<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Inventory;
use Auth;

use App\Http\Controllers\GeneralController;

class InventoryController extends Controller
{
    /**
     * Index of inventory
     */
    public function index()
    {
    	return view('common.inventory.index');
    }


    /**
     * Item Entry
     */
    public function itemEntry()
    {
    	$items = \App\Item::where('active', 1)->get();
    	$suppliers = \App\Supplier::where('active', 1)->get();
    	$units = \App\UnitOfMeasurement::where('active', 1)->get();

    	return view('common.inventory.entry', ['suppliers' => $suppliers, 'units' => $units, 'items' => $items]);
    }



    /**
     * Outgoing Item
     */
    public function outgoingItem()
    {
        // items
        // customers
        // farms
        // units
        $items = \App\Inventory::get();
        $units = \App\UnitOfMeasurement::where('active', 1)->get();
        $customers = \App\Customer::where('active', 1)->get();
        $farms = \App\Farm::where('active', 1)->get();

        $municipalities = \App\Municipality::where('active', 1)->orderBy('name', 'asc')->get();


        return view('common.inventory.outgoing', ['customers' => $customers, 'farms' => $farms, 'units' => $units, 'items' => $items, 'municipalities' => $municipalities]);
    }



    /**
     * store
     * TRANSACTION TYPE 1
     */
    public function storeItemEntry(Request $request)
    {

        // return $request;
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





        if(Auth::user()->user_type == 1) {
            $details = 'Admin Added Item Entry';
        }
        else {
            $details = 'Employee Added Item Entry';
        }

        GeneralController::log($details);

        return redirect()->route('item.entry')->with('success', 'Entry Save!');

    }


    /**
     * STORE 
     * TRANSACTION TYPE 2
     */
    public function storeOugoingItem(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'reference_number' => 'required',
            'item1' => 'required',
            'quantity1' => 'required',
            // 'price1' => 'required',
        ]);


        $customer = $request['customer'];
        $reference_number = $request['reference_number'];

        $item1 = $request['item1'];
        $quantity1 = $request['quantity1'];
        // $price1 = $request['price1'];
        $price1 = 0;

        // return $this->decryptString($customer);

        // $item2 = $request['item2'];
        // $quantity2 = $request['quantity2'];
        // $price2 = $request['price2'];

        // $item3 = $request['item3'];
        // $quantity2 = $request['quantity3'];
        // $price3 = $request['price3'];

        // $item4 = $request['item4'];
        // $quantity4 = $request['quantity4'];
        // $price4 = $request['price4'];

        // $item5 = $request['item5'];
        // $quantity5 = $request['quantity5'];
        // $price5 = $request['price5'];



        // Item 1
        $item1 = Inventory::findorfail($this->decryptString($item1));

        if(!empty($item1)) {

            if($item1->quantity > $quantity1) {
                $item1->quantity -= $quantity1;
                $item1->save();

                // Add Transaction
                $t1 = new Transaction();
                $t1->transaction_type = 2;
                $t1->farm_id = $this->decryptString($customer);
                $t1->item_id = $item1->item->item_id;
                $t1->quantity = $quantity1;
                $t1->unit_of_measurement_id = $item1->unit->unit_of_measurement_id;
                $t1->price = $price1;
                $t1->save();

                $barangay_id = $request['municipality_barangay'];
                $barangay_id = $this->decryptString($barangay_id);

                $barangay = \App\Barangay::findorfail($barangay_id);

                // check item1 id and barangay id if exist in baranga
                $check1 = \App\ItemBarangay::where('barangay_id', $barangay_id)
                                ->where('item_id', $item1->item->item_id)
                                ->first();

                if(!empty($check1)) {
                    $check1->count += $quantity1;
                    $check1->save();
                }
                else {
                    $new1 = new \App\ItemBarangay();
                    $new1->barangay_id = $barangay_id;
                    $new1->item_id = $item1->item->item_id;
                    $new1->count = $quantity1;
                    $new1->save();

                }

                $check2 = \App\ItemMunicipality::where('municipality_id', $barangay->municipality->municipality_id)
                                ->where('item_id', $item1->item->item_id)
                                ->first();


                if(!empty($check2)) {
                    $check2->count += $quantity1;
                    $check2->save();
                }
                else {
                    $new2 = new \App\ItemMunicipality();
                    $new2->municipality_id = $barangay->municipality->municipality_id;
                    $new2->item_id = $item1->item->item_id;
                    $new2->count = $quantity1;
                    $new2->save();

                }


                if(Auth::user()->user_type == 1) {
                    $details = 'Admin Added Item Entry';
                }
                else {
                    $details = 'Employee Added Item Entry';
                }

                GeneralController::log($details);

                return redirect()->route('item.outgoing')->with('success', 'Outgoing Item Saved!');            
            }

            return redirect()->route('item.outgoing')->with('error', 'Quantity Insuficient!');

        }


        // // item 2 (optional)
        // if($item2 != NULL) {
        //     $item2 = Inventory::findorfail($this->decryptString($item2));

        //     if(!empty($item2)) {
        //         $item2->quantity -= $quantity2;
        //         // $item2->save();

        //         // Add Transaction
        //         $t2 = new Transaction();
        //         $t2->transaction_type = 2;
        //         $t2->customer_id = $this->decryptString($customer);
        //         $t2->item_id = $item2->item->item_id;
        //         $t2->quantity = $quantity2;
        //         $t2->unit_of_measurement_id = $item2->unit->unit_of_measurement_id;
        //         // $t2->save();
        //     }

        // }
        
        // // item 3 (optional)
        // if($item3 != NULL) {
        //     $item3 = Inventory::findorfail($this->decryptString($item3));

        //     if(!empty($item3)) {
        //         $item3->quantity -= $quantity3;
        //         // $item3->save();

        //         // Add Transaction
        //         $t3 = new Transaction();
        //         $t3->transaction_type = 2;
        //         $t3->customer_id = $this->decryptString($customer);
        //         $t3->item_id = $item3->item->item_id;
        //         $t3->quantity = $quantity3;
        //         $t3->unit_of_measurement_id = $item3->unit->unit_of_measurement_id;
        //         // $t3->save();
        //     }

        // }

        // // item 4 (optional)
        // if($item4 != NULL) {
        //     $item4 = Inventory::findorfail($this->decryptString($item4));

        //     if(!empty($item4)) {
        //         $item4->quantity -= $quantity4;
        //         // $item4->save();

        //         // Add Transaction
        //         $t4 = new Transaction();
        //         $t4->transaction_type = 2;
        //         $t4->customer_id = $this->decryptString($customer);
        //         $t4->item_id = $item4->item->item_id;
        //         $t4->quantity = $quantity4;
        //         $t4->unit_of_measurement_id = $item2->unit->unit_of_measurement_id;
        //         // $t4->save();
        //     }

        // }

        // // item 5 (optional)
        // if($item5 != NULL) {
        //     $item5 = Inventory::findorfail($this->decryptString($item5));

        //     if(!empty($item5)) {
        //         $item5->quantity -= $quantity5;

        //         // Add Transaction
        //         $t5 = new Transaction();
        //         $t5->transaction_type = 2;
        //         $t5->customer_id = $this->decryptString($customer);
        //         $t5->item_id = $item5->item->item_id;
        //         $t5->quantity = $quantity5;
        //         $t5->unit_of_measurement_id = $item5->unit->unit_of_measurement_id;
        //     }
        // }



    }



    /**
     * checkCriticalStock
     * This is to check the level of current number of items in inventory record
     */
    public static function checkCriticalStock($item_id = NULL)
    {
        $item = \App\Item::findorfail($item_id);

        $item_inv = \App\Inventory::where('item_id', $item->item_id)->first();

        // return ($item->critical_level / 100) * $item->max_stock;

        // get the percentage of the critcal level
        $critical = $item->max_stock * ($item->critical_level/100);

        if($item_inv->quantity <= $critical) {
            return "<button class='btn btn-danger btn-xs'><i class='fa fa-exclamation'></i> Critical Level <i class='fa fa-exclamation'></i></button>";
        }

        return "<button class='btn btn-success btn-xs'><i class='fa fa-check'></i> OK</button>";
    }


    /**
     * inventoryDetails
     */
    public function inventoryDetails($id = NULL)
    {
        $id = $this->decryptString($id);

        $inventory = \App\Inventory::findorfail($id);

        $status = $this->checkCriticalStock($inventory->item_id);

        return view('common.inventory.view', ['inv' => $inventory, 'status' => $status]);
    }



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
            'status' => NULL,
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
                    // 'unit' => 'unit',
                    'quantity' => $i->quantity,
                    'status' => $this->checkCriticalStock($i->item_id),
                    'category' => $i->item->category->item_category_name,
                    'action' => "<button class='btn btn-primary btn-xs' id='view' data-id='" . encrypt($i->inventory_id) . "'><i class='fa fa-eye'></i> View</button>",
                ];
            }
        }

    	return $data;
    }
}
