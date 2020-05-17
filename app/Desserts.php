<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desserts extends Model
{
    //
    protected $table = 'desserts';
    public $timestamps = false;

    protected $fillable = [
        'dessert','price','status'
    ];
}
