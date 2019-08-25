<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Custom Primary Key
     */
    protected $primaryKey = 'item_id';
}
