<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerToMainDish extends Model
{
    //
    protected $table = 'customer_to_main_dish';
    public $timestamps = false;

    protected $fillable = [
        'customer_id','main_dish_id'
    ];
}
