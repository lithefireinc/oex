<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        DB::table('role')->truncate();

        Role::create([
            'id'            => 1,
            'name'          => 'Superuser',
            'slug'          => 'superuser',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);

        Role::create([
            'id'            => 2,
            'name'          => 'Administrator',
            'slug'          => 'admin',
            'description'   => ''
        ]);

        Role::create([
            'id'            => 3,
            'name'          => 'User',
            'slug'          => 'user',
            'description'   => 'A standard user. No administrative features.'
        ]);
    }
}
