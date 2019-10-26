<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingPermit extends Model
{
    protected $primaryKey = 'shipping_permit_id';


    public function originFarm()
    {
    	return $this->belongsTo('App\Farm', 'origin', 'farm_id');
    }
}
