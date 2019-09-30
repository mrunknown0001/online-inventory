<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specy as Species;

class SpecyController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.specy.index');
    }



    /**
     * Add Species
     */
    public function addSpecies()
    {
        return view('admin.specy.add-edit', ['id' => NULL, 'species' => NULL]);
    }


    /**
     * Store Species
     */
    public function storeSpecies(Request $request)
    {
        $request->validate([
            'species' => 'required',
            'description' => 'required',
        ]);

        $species = $request['species'];
        $description = $request['description'];

        // update

        // new
        $new = new Species();
        $new->name = $species;
        $new->description = $description;

        if($new->save()) {
            return redirect()->route('add.species')->with('success', 'Species Saved!');
        }

    }



    /**
     * all species
     */
    public function all()
    {
    	$data = [
    		'specy' => NULL,
    		'details' => NULL,
    		'action' => NULL,
    	];

        $species = Species::where('active', 1)->get();


        if(count($species) > 0) {
            $data = NULL;

            foreach($species as $s) {
                $data[] = [
                    'specy' => $s->name,
                    'details' => $s->description,
                    'action' => "<button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</button>",
                ];
            }
        }

    	return $data;
    }
}
