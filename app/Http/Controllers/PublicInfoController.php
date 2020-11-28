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
     * postAddPublicInfo
     */
    public function postAddPublicInfo(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $title = $request['title'];
        $details = $request['details'];
        $date = $request['date'];
        $time = $request['time'];

        // save
        $new = new \App\PublicInfo();
        $new->title = $title;
        $new->details = $details;
        $new->date = date('Y-m-d', strtotime($date));
        $new->time = $time;

        if($new->save()) {
            return redirect()->route('add.public.info')->with('success', 'Public Info Saved!');
        }
    }


    /**
     * all public information
     */
    public function all()
    {
    	$data = [
    		'info' => NULL,
            'date_time' => NULL,
    		'action' => NULL,
    	];

        $info = \App\PublicInfo::where('active', 1)->get();

        if(count($info) > 0) {
            $data = NULL;

            foreach($info as $i) {
                $data[] = [
                    'info' => $i->title,
                    'details' => $i->details,
                    'date_time' => date('F j, Y', strtotime($i->date)) . ' ' . date('h:i:s a', strtotime($i->time)),
                    'action' => "<button class='btn btn-primary btn-xs' id='view' data-id=" . encrypt($i->public_info_id) . "><i class='fa fa-eye'></i> View</button>"
                ];
            }
        }

    	return $data;
    }


    /**
     * view public info
     */
    public function viewPublicInfo($id)
    {
        $id = $this->decryptString($id);

        $info = \App\PublicInfo::findOrFail($id);

        return view('common.public_info.view', ['event' => $info]);
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
     * View Previous Activity
     */
    public function viewPreviousActivity($id)
    {
        $id =  $this->decryptString($id);

        $activity = \App\PreviousActivity::findOrFail($id);

        return view('view-activity', ['activity' => $activity]);
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
                    'uploaded' => date('F j, Y h:i:s a', strtotime($p->created_at)),
                    'action' => "<a target='_blank' href='" . route('view.previous.activity', ['id' => encrypt($p->previous_activity_id)]) . "' class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</a>",
                ];
            }
        }

        return $data;
    }   
}
