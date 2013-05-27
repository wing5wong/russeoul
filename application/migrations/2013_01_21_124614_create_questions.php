<?php

class Create_Questions {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('questions', function($table)
		{
			$table->increments('id');
			$table->string('question');
			$table->string('answer');
			$table->timestamps();
		});
		
		
		/*$question = new Question;
		$question->question = "Test question";
		$question->answer = "Test question's correct answer";
		$question->timestamps();
		$question->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('questions' );
	}

}
