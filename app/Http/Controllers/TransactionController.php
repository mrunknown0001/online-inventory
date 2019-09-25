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

		$trans = \App\Transaction::orderBy('created_at', 'asc')->get();

		if(count($trans) > 0) {
			$data = NULL;

			foreach($trans as $t) {
				$data[] = [
					'transactions' => $t->transaction_type == 1 ? 'Incomming' : 'Outgoing',
					'details' => $t->quantity . ' ' . $t->unit->code . ' of ' . $t->item->item_name,
					'date_time' => date('F j, Y h:i:s a', strtotime($t->created_at)),
				];
			}
		}

		return $data;
	}


}
