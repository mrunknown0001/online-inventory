<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'customer_id';
}
