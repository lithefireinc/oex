<?php

use App\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    public function run()
    {
        QuestionType::truncate();

        QuestionType::create([
            'question_type' => 'Rate',
        ]);
        QuestionType::create([
            'question_type' => 'Essay',
        ]);
    }
}
