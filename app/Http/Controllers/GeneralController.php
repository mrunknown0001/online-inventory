<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AuditTrail;


class GeneralController extends Controller
{
    /**
     * Landing Page
     */
    public function landingPage()
    {
    	if(Auth::check()) {
    		if(Auth::user()->user_type == 1) {
    			return redirect()->route('admin.dashboard');
    		}
    		else {
    			return redirect()->route('emp.dashboard');
    		}
    	} 

        // get latest 10 images in activities
        $images = \App\PreviousActivity::orderBy('created_at', 'desc')->take(10)->get();


    	return view('welcome', ['images' => $images]);
    }






    /**
     * Audit Trail method
     */
    public static function log($details)
    {
        $user = Auth::user();


        $log = new AuditTrail();

        $log->user_id = $user->user_id;
        $log->details = $details;
        $log->save();
    }



    /**
     * allCalendar
     */
    public function allCalendar()
    {
        $info = \App\PublicInfo::where('active', 1)->get();
        $data = NULL;

        if(count($info) > 0) {
            foreach($info as $i) {
                $data[] = [
                    'title' => $i->title,
                    'description' => $i->details,
                    'start' => $i->date.'T'.$i->time,
                    'url' => route('view.event', ['id' => encrypt($i->public_info_id)]),
                ];
            }
        }

        return $data;
    }


    /**
     * View Event
     */
    public function viewEvent($id)
    {
        $id = $this->decryptString($id);

        $event = \App\PublicInfo::findOrFail($id);

        return view('view-event', ['event' => $event]);
    }



    /**
     * validUntil
     */
    public static function validUntil($date)
    {
        $d = date('m/d/y', strtotime($date));

        $today = date('m/d/y', strtotime(now()));

        if($today <= $d) {
            return NULL;
        }

        return "<button class='btn btn-danger btn-xs'>Expired</button>";
    }


}
