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
        $id = $request['id'];


        if($id == NULL) {
            $new = new \App\Animal();
        }
        else {
            $id = $this->decryptString($id);
            $new = \App\Animal::find($id);
        }
        // store
        
        $new->specy_id = $species;
        $new->name = $animal;

        if($new->save()) {
            return redirect()->route('add.animal')->with('success', 'Animal saved!');
        }
    }



    /**
     * update
     */
    public function updateAnimal($id = NULL)
    {
        $id = $this->decryptString($id);

        $animal = \App\Animal::findorfail($id);

        $species  = \App\Specy::where('active', 1)->get();

        return view('admin.animal.add-edit', ['animal' => $animal, 'id' => $animal->animal_id, 'species' => $species]);
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
                    'action' => "<button class='btn btn-info btn-xs' id='update' data-id='" . encrypt($a->animal_id) . "'><i class='fa fa-pencil'></i> Update</button>",
                ];
            }
        }

    	return $data;
    }
}
