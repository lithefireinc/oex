<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_user')->truncate();
        DB::statement("SET foreign_key_checks = 0");

        $role_user = [
            [
                'role_id' => '2',
                'user_id' => '1'
            ],[
                'role_id' => '3',
                'user_id' => '2'
            ]
        ];
        DB::table('role_user')->insert($role_user);
    }
}
