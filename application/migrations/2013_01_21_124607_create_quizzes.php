<?php

class Create_Quizzes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('quizzes', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('instructions');
			$table->timestamps();
		});
		
		
		/*$quiz = new Quiz;
		$quiz->name = "Test quiz";
		$quiz->timestamps();
		$quiz->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('quizzes' );
	}

}
