<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('code', 8);
            $table->string('title');
            $table->string('description');
            $table->string('welcome_message');
            $table->string('end_message');
            $table->string('url');
            $table->text('instructions');
            $table->integer('question_set_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->boolean('active');
            $table->dateTime('expires');
            $table->dateTime('start_date');
            $table->dateTime('deactivated_date');
            $table->integer('deactivated_by_id')->unsigned();
            $table->integer('created_by_id')->unsigned();
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
		Schema::drop('surveys');

        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            if (strpos($table->Tables_in_oex, 'results')!==false)
                Schema::drop($table->Tables_in_oex);
        }
	}

}
