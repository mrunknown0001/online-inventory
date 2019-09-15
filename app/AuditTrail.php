<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $primaryKey = 'log_id';


    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
