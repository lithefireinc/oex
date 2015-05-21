<?php

use App\Survey;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
{
    public function run()
    {
        Survey::truncate();

        $survey_code = str_random(8);
        Survey::create([

            'title' => "STUDENTS' EVALUATION of FACULTY MEMBER",
            'description' => "STUDENTS' EVALUATION of FACULTY MEMBER",
            'instructions' => 'To Gather information necessary to improve the quality of instructions in PMMS, you are required to evaluate your instructor as objectively and fairly as possible. Rate your instructor by selecting the number that best corresponds to your perception of his/her qualities according to the following rating scale:

                5 - Outstanding/Always/(Palagi)
                4 - Very Good/Frequently/(Madalas)
                3 - Good/Sometimes/(Minsan)
                2 - Fail/Rarely/(Halos Hindi)
                1 - Poor/Never/(Hindi)',
            'question_set_id' => '1',
            'code'=> $survey_code,
            'faculty_id' => '1',
            'question_set_id' => 1,
            'start_date' => date('Y-m-d H:i:s'),
            'expires' => date('Y-m-d H:i:s'),

        ]);
        Schema::create('results_'.$survey_code, function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('question_1');
        });
    }
}
