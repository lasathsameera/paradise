<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishesCount extends Model
{
    //
    protected $table = 'dishes_count';
    public $timestamps = false;

    protected $fillable = [
        'type','dish_id','count'
    ];
}
