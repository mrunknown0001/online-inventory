<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Dashboard
     */
    public function dashboard()
    {
    	return view('common.dashboard2');
    }


    /**
     * Employee Profile
     */
    public function profile()
    {
    	return view('employee.profile');
    }


    /**
     * Employee Change Password
     */
    public function changePassword()
    {
        return view('employee.change-pass');
    }


    /**
     * save password
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
        $user = Auth::user();

        if(password_verify($old_password, $user->password)) {
            $user->password = bcrypt($new_password);

            if($user->save()) {
                return redirect()->route('employee.change.password')->with('success', 'Employee changed password!');
            }
        }
        else {
            return redirect()->route('employee.change.password')->with('error', 'Wrong Password!');
        }
    }
}
