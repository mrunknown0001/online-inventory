<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'transaction_id';
}
