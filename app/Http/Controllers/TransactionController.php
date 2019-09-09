<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
	/**
	 * Index
	 */
	public function index()
	{
		return view('common.transaction.index');
	}




	/**
	 * All Transactions
	 */
	public function allTransactions()
	{
		$data = [
			'transactions' => NULL,
			'details' => NULL,
			'date_time' => NULL,
		];

		return $data;
	}


}
