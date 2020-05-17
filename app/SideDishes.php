<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SideDishes extends Model
{
    //
    protected $table = 'side_dishes';
    public $timestamps = false;

    protected $fillable = [
        'side_dish','price','status'
    ];
}
