<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerToSideDish extends Model
{
    //
    protected $table = 'customer_to_side_dish';
    public $timestamps = false;

    protected $fillable = [
        'customer_id','side_dish_id'
    ];
}
