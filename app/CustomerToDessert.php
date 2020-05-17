<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerToDessert extends Model
{
    //
    protected $table = 'customer_to_dessert';
    public $timestamps = false;

    protected $fillable = [
        'customer_id','dessert_id'
    ];
}
