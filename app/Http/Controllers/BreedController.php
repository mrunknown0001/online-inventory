<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
    	return view('admin.breed.index');
    }


    /**
     * Add Breed
     */
    public function addBreed()
    {
        $animals = \App\Animal::where('active', 1)->orderBy('name', 'asc')->get();

        return view('admin.breed.add-edit', ['id' => NULL, 'breed' => NULL, 'animals' => $animals]);
    }


    /**
     * Store Breed
     */
    public function storeBreed(Request $request)
    {
        $request->validate([
            'animal' => 'required',
            'breed' => 'required',
        ]);

        $id = $request['id'];

        $animal = $this->decryptString($request['animal']);
        $breed = $request['breed'];

        if($id == NULL) {
            $new = new \App\Breed();
        }
        else {
            $id = $this->decryptString($id);
            $new = \App\Breed::findorfail($id);
        }
        $new->name = $breed;
        $new->animal_id = $animal;

        if($new->save()) {
            return redirect()->route('add.breed')->with('success', 'Breed Saved!');
        }
    }


    /**
     * updateBreed
     */
    public function updateBreed($id = NULL)
    {
        $id = $this->decryptString($id);

        $breed = \App\Breed::findorfail($id);

        $animals = \App\Animal::where('active', 1)->get();

        return view('admin.breed.add-edit', ['id' => $id, 'breed' => $breed, 'animals' => $animals]);
    }


    /**
     * all breeds
     */
    public function all()
    {
    	$data = [
    		'breed' => NULL,
    		'animal' => NULL,
    		'action' => NULL,
    	];


        $breeds = \App\Breed::where('active', 1)->orderBy('name', 'asc')->get();

        if(count($breeds) > 0) {
            $data = NULL;

            foreach($breeds as $b) {
                $data[] = [
                    'breed' => $b->name,
                    'animal' => $b->animal->name,
                    'action' => "<button class='btn btn-info btn-xs' id='update' data-id='" . encrypt($b->breed_id) . "'><i class='fa fa-pencil'></i> Update</button>",
                ];
            }
        }

    	return $data;
    }
}
