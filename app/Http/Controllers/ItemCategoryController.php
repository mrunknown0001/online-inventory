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
}
