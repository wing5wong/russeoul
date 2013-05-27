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
			$table->string('questionText');
			$table->integer('questionType_id')->unsigned();
			$table->integer('quiz_id')->unsigned();

			$table->timestamps();

			$table->foreign('quiz_id')->references('id')->on('quizzes')->on_delete('cascade')->on_update('cascade');
			$table->foreign('questionType_id')->references('id')->on('questiontypes')->on_delete('cascade')->on_update('cascade');
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
