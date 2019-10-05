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
     * store image
     */
    public function postAddPreviousActivityImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $image = $request['image'];

        $imageName = date('m-d-Y h-i-s-u', strtotime(now())) . '.' . $image->getClientOriginalExtension();

        $success = $image->move(public_path('uploads/img'), $imageName);


        $new = new \App\PreviousActivity();
        $new->image = $imageName;

        if($new->save()) {
            return redirect()->route('add.previous.activity.image')->with('success', 'Image Uploaded!');
        }


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


        $previousActivities = \App\PreviousActivity::get();

        if(count($previousActivities) > 0) {
            $data = NULL;

            foreach($previousActivities as $p) {
                $data[] = [
                    'image' => $p->image,
                    'uploaded' => $p->created_at,
                    'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>",
                ];
            }
        }

        return $data;
    }   
}
