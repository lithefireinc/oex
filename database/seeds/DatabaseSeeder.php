<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('QuestionSetsTableSeeder');
        $this->call('QuestionCategoriesTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('SurveysTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('QuestionTypesTableSeeder');
	}

}
