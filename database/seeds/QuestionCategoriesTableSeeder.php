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
            'description' => 'Instructional Skills',
            'order' => '1'
        ]);
        QuestionCategory::create([
            'description' => 'Evaluation Skills',
            'order' => '2'
        ]);
        QuestionCategory::create([
            'description' => 'Question Related to your Course (Subject)',
            'order' => '3'
        ]);
    }
}
