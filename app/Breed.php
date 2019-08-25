<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'breed_id';

    public function animal()
    {
    	return $this->belongsTo('App\Animal', 'animal_id');
    }
}
