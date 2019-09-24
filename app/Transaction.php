<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'transaction_id';


    public function item()
    {
    	return $this->belongsTo('App\Item', 'item_id');
    }


    public function unit()
    {
    	return $this->belongsTo('App\UnitOfMeasurement', 'unit_of_measurement_id');
    }
}
