<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicInfoController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('common.public_info.index');
    }


    /**
     * add public information
     */
    public function addPublicInfo()
    {
        return view('common.public_info.add-edit', ['id' => NULL, 'info' => NULL]);
    }


    /**
     * all public information
     */
    public function all()
    {
    	$data = [
    		'info' => NULL,
    		'details' => NULL,
            'date_time' => NULL,
    		'action' => NULL,
    	];

    	return $data;
    }









    /**
     * Previous Activities
     */
    public function previousActivities()
    {
        return view('common.public_info.activities');
    }



    /**
     * addPreviousActivityImage
     */
    public function addPreviousActivityImage()
    {
        return view('common.public_info.add-image', ['id' => NULL, 'image' => NULL]);
    }


    /**
     * All Images in preivous activities
     */
    public function allPreviousActivities()
    {
        $data = [
            'image' => NULL,
            'uploaded' => NULL,
            'action' => NULL,
        ];


        return $data;
    }   
}
