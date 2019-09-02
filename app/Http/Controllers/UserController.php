<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Index for user management
     */
    public function index()
    {
    	return view('admin.user.index');
    }



    /**
     * All users Data
     */
    public function all()
    {
    	 $data = [
    	 	'username' => NULL,
    	 	'fullname' => NULL,
    	 	'user_type' => NULL,
    	 	'action' => NULL,
    	 ];

    	 // get all active users
    	 $users = User::where('active', 1)->get();

    	 // if $users is not empty
    	 if(count($users) > 0) {
    	 	$data = null;
    	 	foreach($users as $u) {
    	 		$data[] = [
    	 			'username' => $u->username,
    	 			'fullname' => $u->firstname . ' ' . $u->lastname,
    	 			'user_type' => $u->user_type,
    	 			'action' => '<button class="btn btn-primary btn-xs">action</button>'
    	 		];
    	 	}
    	 }

    	 return $data;
    }
}
