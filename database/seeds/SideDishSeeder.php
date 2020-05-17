<?php

use Illuminate\Database\Seeder;
use App\SideDishes;

class SideDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SideDishes::create([
            'side_dish' => 'Wadai',
            'price' => '45',
            'status' => '1'
        ]);

        SideDishes::create([
            'side_dish' => 'Dhal curry',
            'price' => '75',
            'status' => '1'
        ]);

        SideDishes::create([
            'side_dish' => 'Fish curry',
            'price' => '120',
            'status' => '1'
        ]);
    }
}
