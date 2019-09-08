<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Decrypt Encrypted String
     * @return decrypted string
     */
    public function decryptString($string)
    {
    	try {
    		$string = decrypt($string);
    	}
    	catch (\Exception $e) {
    		return NULL;
    	}

    	return $string;
    }



    /**
     * method use to check username's existence
     */
    public function checkUsername($username, $user_id)
    {
        $user = \App\User::find($user_id);

        $user2 = \App\User::where('username', $username)->first();

        if(!empty($user2)) {
            if($user->user_id != $user2->user_id) {
                return false;
            }
        }

        return true;
    }
}
