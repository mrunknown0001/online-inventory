<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $primaryKey = 'inventory_id';


    public function item()
    {
    	return $this->belongsTo('App\Item', 'item_id');
    }


    public function unit()
    {
    	return $this->belongsTo('App\UnitOfMeasurement', 'unit_of_measurement_id');
    }
}
