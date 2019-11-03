<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.farm.index');
    }


    /**
     * Add Farm 
     */
    public function addFarm()
    {
        return view('admin.farm.add-edit', ['id' => NULL, 'farm' => NULL]);
    }


    /**
     * store farm
     */
    public function postAddFarm(Request $request)
    {
        $request->validate([
            'farm' => 'required',
            'description' => 'required',
        ]);


        $farm = $request['farm'];
        $description = $request['description'];


        // save
        $new = new \App\Farm();
        $new->name = $farm;
        $new->description = $description;

        if($new->save()) {
            return redirect()->route('add.farm')->with('success', 'Farm Saved!');
        }
    }



    /**
     * viewfarm
     */
    public function viewFarm($id = NULL)
    {
        $id = $this->decryptString($id);

        $farm = \App\Farm::findorfail($id);

        return view('admin.farm.view', ['farm' => $farm]);
    }


    /**
     * all farms
     */
    public function all()
    {
    	$data = [
    		'name' => NULL,
    		'description' => NULL,
    		'action' => NULL,
    	];


        $farms = \App\Farm::where('active', 1)->get();

        if(count($farms) > 0) {
            $data = NULL;

            foreach($farms as $f) {
                $data[] = [
                    'name' => $f->name,
                    'description' => $f->description,
                    'action' => "<button class='btn btn-primary btn-xs' id='view' data-id='" . encrypt($f->farm_id) . "'><i class='fa fa-eye'></i> View</button>",
                ];
            }
        }

    	return $data;
    }
}
