<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * all
     */
    public function all()
    {
    	$data = [
    		'item_categories' => NULL,
    		'description' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }
}
