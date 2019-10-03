<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /**
     * Custom Primary key
     */
    protected $primaryKey = 'animal_id';

    public function species()
    {
    	return $this->belongsTo('App\Specy', 'specy_id');
    }


    public function breeds()
    {
    	return $this->hasMany('App\Breed', 'animal_id');
    }
}
