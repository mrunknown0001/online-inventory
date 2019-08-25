<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'municipality_id';


    public function barangays()
    {
    	return $this->hasMany('App\Barangay', 'municipality_id');
    }
}
