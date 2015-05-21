<?php

use App\Faculty;
use Illuminate\Database\Seeder;


class FacultiesTableSeeder extends Seeder
{
    public function run()
    {
        Faculty::truncate();

        Faculty::create([
            'first_name' => 'Kellen Cristofer',
            'middle_name' => 'Naga',
            'last_name' => 'Bernal'
        ]);
        Faculty::create([
            'first_name' => 'Primeiro',
            'middle_name' => 'Panonce',
            'last_name' => 'Bristol'
        ]);
    }
}
