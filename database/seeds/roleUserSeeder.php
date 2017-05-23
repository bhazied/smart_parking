<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_SUBSCRIBER', 'ROLE_SUPERVOSOR'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'description' => $role. ' description',
                'created_at' => Carbon::now()
            ]);
        }

        for ($i=0; $i< 60; $i++) {
            DB::table('role_user')->insert([
                'user_id' => rand(1, 10),
                'role_id' => rand(1, 4),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
