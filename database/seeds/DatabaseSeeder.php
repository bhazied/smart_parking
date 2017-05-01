<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);

        //$country = factory(\App\Model\Country::class, 100)->create();

        $user = factory(\App\Model\User::class, 10)->create(['country_id' => 200]);
    }
}
