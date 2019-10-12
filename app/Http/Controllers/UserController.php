<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Controllers\GeneralController;

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


        $id = $request['id'];

        // save
        if($id != NULL) {
            // validate input
            $request->validate([
                'username' => 'required',
                'firstname' => 'required',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'suffix' => 'nullable',
                'email' => 'required',
            ]);

            // manual check for username and email address
            $username = $request['username'];
            $email = $request['email'];

            // update
            $id = $this->decryptString($id);

            $user = User::findorfail($id);

            // username already exist
            if($this->checkUsername($username, $id) != true) {
                return redirect()->route('add.user')->with('error', 'Username already used!');
            }

            // email address check
            if($this->checkUsername($email, $id) != true) {
                return redirect()->route('add.user')->with('error', 'Email already used!');
            }

            $details = 'Admin Update Employee Details';
        }
        else {
            // validate input
            $request->validate([
                'username' => 'required|unique:users',
                'firstname' => 'required',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'suffix' => 'nullable',
                'email' => 'required|unique:users',
            ]);

            // create
            $user = new User();
            $user->password = bcrypt('password');


            $details = 'Admin Created New Employee';

        }

        // assign to variable
        $username = $request['username'];
        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $suffix = $request['suffix'];
        $email = $request['email'];
        // $user_type = $request['user_type'];

        $user->username = $username;
        $user->firstname = $firstname;
        $user->middlename = $middlename;
        $user->lastname = $lastname;
        $user->suffix_name = $suffix;
        $user->email = $email;
        // $user->user_type = $user_type;


        if($user->save()) {
            // add user log here / audit trail
            GeneralController::log($details);

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
     * Remove user
     */
    public function removeUser($id = null)
    {
        $id = $this->decryptString($id);

        $user = User::findorfail($id);

        $user->active = 0;

        if($id == 1) {
            return abort(404);
        }

        $details = 'Admin Removed User: ' . $user->username;
        GeneralController::log($details);

        $user->save();
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
    	 			'action' => '<button class="btn btn-primary btn-xs" id="view" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-eye"></i> View</button> <button class="btn btn-warning btn-xs" id="update" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-pencil"></i> Update</button> <button class="btn btn-info btn-xs" id="changepass"><i class="fa fa-key"></i> Change Password</button> <button class="btn btn-danger btn-xs" id="remove" data-id="' . encrypt($u->user_id) . '"><i class="fa fa-trash"></i> Remove</button>'
    	 		];
    	 	}
    	 }

    	 return $data;
    }






















    /************************
    * Common for all users  *
    * **********************/

    // change password
    public function changePassword()
    {
        return 'change password for all users';
    }
}
