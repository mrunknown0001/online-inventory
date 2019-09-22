<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

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
        $categories = \App\ItemCategory::where('active', 1)->orderBy('item_category_name', 'ASC')->get();
        // units
        $units = \App\UnitOfMeasurement::where('active', 1)->orderBy('name', 'ASC')->get();

        return view('admin.item.add-edit', ['id' => NULL, 'item' => NULL, 'categories' => $categories, 'units' => $units]);
    }


    /**
     * store item
     */
    public function storeItem(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'item_category' => 'required',
            'unit_of_measurement' => 'required',
            'quantity' => 'required',
        ]);

        $item = $request['item'];
        $code = $request['code'];
        $description = $request['description'];
        $item_category = $this->decryptString($request['item_category']);
        $unit = $this->decryptString($request['unit_of_measurement']);
        $quantity = $request['quantity'];

        // store
        $i = new Item();
        $i->item_name = $item;
        $i->item_code = $code;
        $i->item_description = $description;
        $i->item_category_id = $item_category;
        $i->unit_of_measurement_id = $unit;
        $i->quantity = $quantity;

        if($i->save()) {
            return redirect()->route('add.item')->with('success', 'Item Saved!');
        }
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

        $items = Item::where('active', 1)->get();

        if(count($items) > 0) {
            $data = NULL;

            foreach($items as $i) {
                $data[] = [
                    'item' => $i->item_name,
                    'code' => $i->item_code,
                    'quantity' => $i->quantity,
                    'unit_of_measurement' => $i->unit->name,
                    'category' => $i->category->item_category_name,
                    'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>", 
                ];
            }
        }

    	return $data;
    }
}
