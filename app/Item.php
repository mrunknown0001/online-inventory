<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'item_id';


    public function unit()
    {
    	return $this->hasOne('App\UnitOfMeasurement', 'unit_of_measurement_id');
    }


    public function category()
    {
    	return $this->belongsTo('App\ItemCategory', 'item_category_id');
    }
}
