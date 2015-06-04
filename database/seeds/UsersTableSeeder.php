<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
//        User::truncate();
        DB::table('users')->delete();
        DB::statement("SET foreign_key_checks = 0");

        User::create([
            'email' => 'admin@example.com' ,
            'username' => 'admin',
            'password' => Hash::make('123456') ,
            'name' => 'admin',
        ]);

        User::create([
            'email' => 'student@example.com' ,
            'username' => 'student',
            'password' => Hash::make('123456') ,
            'name' => 'student',
        ]);

    }
}
