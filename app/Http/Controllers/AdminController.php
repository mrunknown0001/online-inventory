<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditTrail;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
    	$count = \App\User::whereActive(1)->count();

    	return view('common.dashboard', ['count' => $count]);
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
