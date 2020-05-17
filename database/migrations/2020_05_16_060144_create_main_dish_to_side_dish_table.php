<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainDishToSideDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_dish_to_side_dish', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('main_dish_id');
            $table->bigInteger('side_dish_id');
            $table->bigInteger('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_dish_to_side_dish');
    }
}
