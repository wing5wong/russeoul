<?php

class Create_Question_Quiz {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('question_quiz', function($table)
		{
			$table->increments('id');
			$table->integer('question_id')->unsigned();
			$table->integer('quiz_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('question_id')->references('id')->on('questions')->on_delete('restrict')->on_update('restrict');
			
			$table->foreign('quiz_id')->references('id')->on('quizzes')->on_delete('restrict')->on_update('restrict');
		});
		
		
		/*$quiz = Quiz::find(1);
		$quiz->questions()->attach(1);*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('question_quiz' );
	}

}


