<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'barangay_id';


    public function municipality()
    {
    	return $this->belongsTo('App\Municipality', 'municipality_id');
    }
}
