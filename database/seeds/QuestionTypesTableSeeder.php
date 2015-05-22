<?php

use App\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    public function run()
    {
        QuestionType::truncate();

        QuestionType::create([
            'description' => 'Rating (1-5)',
        ]);
        QuestionType::create([
            'description' => 'Essay',
        ]);
    }
}
