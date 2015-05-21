<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('question_set_id')->unsigned();
            // $table->foreign('question_sets_id')->references('id')->on('question_sets');
			$table->integer('question_type_id')->unsigned();
			$table->string('title');
			$table->text('question');
			$table->tinyInteger('required');
			$table->integer('order')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
