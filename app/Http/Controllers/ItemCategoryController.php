<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemCategory;

class ItemCategoryController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.item_category.index');
    }



    /**
     * Add inventory Management
     */
    public function addItemCategory()
    {
    	return view('admin.item_category.add-edit', ['id' => NULL, 'category' => NULL]);
    }



    /**
     * storeItemCategory method
     */
    public function storeItemCategory(Request $request)
    {
    	$request->validate([
    		'item_category' => 'required',
    		'description' => 'nullable',
    	]);

    	$item_category = $request['item_category'];
    	$description = $request['description'];

    	// store
    	$cat = new ItemCategory();

    	$cat->item_category_name = $item_category;
    	$cat->description = $description;

    	if($cat->save()) {
    		return redirect()->route('add.item.category')->with('success', 'Item Category Saved!');
    	}

    }


    /**
     * viewItemCategory
     */
    public function viewItemCategory($id = NULL)
    {
        $id = $this->decryptString($id);

        $cat = \App\ItemCategory::findorfail($id);

        return view('admin.item_category.view', ['cat' => $cat]);
    }



    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'item_categories' => NULL,
    		'description' => NULL,
    		'action' => NULL,
    	];

    	$categories = ItemCategory::where('active', 1)->get();

    	if(count($categories) > 0) {
    		$data = NULL;

    		foreach($categories as $c) {
    			$data[] = [
    				'item_categories' => $c->item_category_name,
    				'description' => $c->description,
    				'action' => "<button class='btn btn-primary btn-xs' id='view' data-id='" . encrypt($c->item_category_id) . "'><i class='fa fa-eye'></i> View</button>"
    			];
    		}
    	}

    	return $data;
    }
}
