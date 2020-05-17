<?php

use Illuminate\Database\Seeder;
use App\MainDishes;

class MainDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainDishes::create([
            'main_dish' => 'Rice',
            'price' => '100',
            'status' => '1'
        ]);

        MainDishes::create([
            'main_dish' => 'Rotty',
            'price' => '20',
            'status' => '1'
        ]);

        MainDishes::create([
            'main_dish' => 'Noodles',
            'price' => '150',
            'status' => '1'
        ]);
    }
}
