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
        $id = NULL;
        $user = NULL;

    	return view('admin.user.add-edit', ['id' => $id, 'user' => $user]);
    }



    /**
     * Store user
     * Can be use in add and update
     */
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'suffix' => 'nullable',
            'email' => 'required',
            'user_type' => 'required'
        ]);

        // assign to variable
        $username = $request['username'];
        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $suffix = $request['suffix'];
        $email = $request['email'];
        $user_type = $request['user_type'];

        $id = $request['id'];

        // save
        if($id != NULL) {
            // update
            $id = $this->decryptString($id);

            $user = User::findorfail($id);
        }
        else {
            // create
            $user = new User();
            $user->password = bcrypt('password');

        }

        $user->username = $username;
        $user->firstname = $firstname;
        $user->middlename = $middlename;
        $user->lastname = $lastname;
        $user->suffix_name = $suffix;
        $user->email = $email;
        $user->user_type = $user_type;


        if($user->save()) {
            return redirect()->route('add.user')->with('success', 'User Saved!');
        }

        return redirect()->route('users')->with('error', 'Please Try Again Later!');
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
    	 			'user_type' => $u->user_type == 1 ? 'Admin' : 'Employee',
    	 			'action' => '<button class="btn btn-primary btn-xs" id="view" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-eye"></i> View</button> <button class="btn btn-warning btn-xs" id="update" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-pencil"></i> Update</button>'
    	 		];
    	 	}
    	 }

    	 return $data;
    }
}
