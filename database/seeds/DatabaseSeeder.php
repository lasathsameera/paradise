<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Desserts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DessertSeeder::class,
            MainDishSeeder::class,
            SideDishSeeder::class,
        ]);

    }
}
