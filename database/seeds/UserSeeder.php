<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'lasath',
            'email' => 'test@test.com',
            'password' => '$2y$10$QMFuDvAkIeyYUsIUwyQcK.gM0nhmq7rrfT7l8i6QlJ.dcnzrF4PU6',
            'remember_token'=>'sfsfadasdasdasdas',
            'created_at' =>'2020-05-17 20:43:31',
            'updated_at' =>'2020-05-17 20:43:31'
        ]);

    }
}
