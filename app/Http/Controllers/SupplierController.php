<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Index 
     */
    public function index()
    {
    	return view('admin.supplier.index');
    }
}
