<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditTrail;
use Auth;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
    	$count = \App\User::whereActive(1)->count();
        $items = \App\Item::whereActive(1)->count();

    	return view('common.dashboard', ['count' => $count, 'items' => $items]);
    }



    /**
     * Admin Profile
     */
    public function profile()
    {
        return view('admin.profile');
    }



    /**
     * Change password
     */
    public function changePassword()
    {
        return view('admin.change-pass');
    }



    /**
     * postChangePassword method
     */
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);


        $old_password = $request['old_password'];
        $new_password = $request['password'];

        // update 


        // save

    }



    /**
     * Latest Transaction Made
     */
    public function latestTransactions()
    {
        $data = [
            'transactions' => NULL,
            'details' => NULL,
            'date_time' => NULL,
        ];

        $trans = \App\Transaction::orderBy('created_at', 'asc')->limit(5)->get();

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



    /**
     * Audit Trail 
     */
    public function auditTrail()
    {
    	return view('admin.audit_trail.index');
    }


    /**
     * All logs
     */
    public function logs()
    {
    	 $data = [
            'user' => NULL,
            'details' => NULL,
            'date_time' => NULL,
        ];

        $logs = AuditTrail::orderBy('created_at', 'desc')->get();

        if(count($logs) > 0) {
            $data = NULL;

            foreach($logs as $l) {
                $data[] = [
                    'user' => $l->user->firstname,
                    'details' => $l->details,
                    'date_time' => date('F j, Y h:i:s a', strtotime($l->created_at)),
                ];
            }
        }

    	return $data;
    }
}
