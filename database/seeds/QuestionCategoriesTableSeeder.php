<?php

use App\QuestionCategory;
use Illuminate\Database\Seeder;

class QuestionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionCategory::truncate();

        QuestionCategory::create([
            'question_set_id' => '1',
            'description' => 'Instructional Skills',
            'order' => '1'
        ]);
        QuestionCategory::create([
            'question_set_id' => '1',
            'description' => 'Question Related to your Course (Subject)',
            'order' => '2'
        ]);
    }
}
