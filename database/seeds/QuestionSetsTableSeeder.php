<?php

use App\QuestionSet;
use Illuminate\Database\Seeder;

class QuestionSetsTableSeeder extends Seeder
{
    public function run()
    {
        QuestionSet::truncate();

        QuestionSet::create([
            'description' => "STUDENTS' EVALUATION of FACULTY MEMBERS"
        ]);

    }
}
