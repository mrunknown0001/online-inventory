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
}
