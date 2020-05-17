<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainDishes extends Model
{
    //
    protected $table = 'main_dishes';
    public $timestamps = false;

    protected $fillable = [
        'main_dish','price','status'
    ];
}
