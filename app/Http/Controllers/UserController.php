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
     *  View User Method
     */
    public function viewUser($id = null)
    {
    	// Decrypt with validation
    	$id = $this->decryptString($id);

    	$user = User::findorfail($id);

    	return view('admin.user.view', ['user' => $user]);
    }


    /**
     * Add User Method
     */
    public function addUser()
    {
    	return view('admin.user.add-edit');
    }



    /**
     * Update User method
     */
    public function updateUser($id = null)
    {
    	$id = $this->decryptString($id);

    	$user = User::findorfail($id);

    	return view('admin.user.add-edit', ['id' => $id, 'user' => $user]);
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
    	 			'action' => '<button class="btn btn-primary btn-xs" id="view" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-eye"></i> View</button> <button class="btn btn-warning btn-xs" id="update" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-pencil"></i> Update</button>'
    	 		];
    	 	}
    	 }

    	 return $data;
    }
}
