<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.animal.index');
    }


    /**
     * Add Animal
     */
    public function addAnimal()
    {
        $species = \App\Specy::where('active', 1)->orderBy('name', 'ASC')->get();

        return view('admin.animal.add-edit', ['id' => NULL, 'animal' => NULL, 'species' => $species]);
    }



    /**
     * Store Animal
     */
    public function storeAnimal(Request $request)
    {
        $request->validate([
            'species' => 'required',
            'animal' => 'required',
        ]);

        $species = $this->decryptString($request['species']);
        $animal = $request['animal'];


        // store
        $new = new \App\Animal();
        $new->specy_id = $species;
        $new->name = $animal;

        if($new->save()) {
            return redirect()->route('add.animal')->with('success', 'Animal saved!');
        }
    }



    /**
     * All Animals
     */
    public function all()
    {
    	$data = [
    		'animal' => NULL,
    		'species' => NULL,
    		'action' => NULL,
    	];

        $animals = \App\Animal::where('active', 1)->orderBy('name', 'ASC')->get();

        if(count($animals) > 0) {
            $data = NULL;

            foreach($animals as $a) {
                $data[] = [
                    'animal' => $a->name,
                    'species' => $a->species->name,
                    'action' => "<button class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</button>",
                ];
            }
        }

    	return $data;
    }
}
