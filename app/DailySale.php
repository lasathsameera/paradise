<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    //
    protected $table = 'daily_sale';
    public $timestamps = false;

    protected $fillable = [
        'main_dish_sale','side_dish_sale','dessert_sale','date'
    ];
}
