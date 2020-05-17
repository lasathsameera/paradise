<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainDishToSideDish extends Model
{
    //
    protected $table = 'main_dish_to_side_dish';
    public $timestamps = false;

    protected $fillable = [
        'main_dish_id','side_dish_id','count'
    ];
}
