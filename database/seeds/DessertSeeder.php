<?php

use Illuminate\Database\Seeder;
use App\Desserts;

class DessertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desserts::create([
            'dessert' => 'Watalappam',
            'price' => '40',
            'status' => '1'
        ]);

        Desserts::create([
            'dessert' => 'Jelly',
            'price' => '20',
            'status' => '1'
        ]);

        Desserts::create([
            'dessert' => 'Pudding',
            'price' => '25',
            'status' => '1'
        ]);
    }
}
