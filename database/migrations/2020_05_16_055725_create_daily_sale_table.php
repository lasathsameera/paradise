<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailySaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('main_dish_sale');
            $table->bigInteger('side_dish_sale');
            $table->bigInteger('dessert_sale');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_sale');
    }
}
