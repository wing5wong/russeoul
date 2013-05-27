<?php

class Create_Course_Quiz {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('course_quiz', function($table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('quiz_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('course_id')->references('id')->on('courses')->on_delete('cascade')->on_update('cascade');
			
			$table->foreign('quiz_id')->references('id')->on('quizzes')->on_delete('cascade')->on_update('cascade');
		});
		
		
		/*$quiz = Quiz::find(1);
		$quiz->courses()->attach(1);*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('course_quiz' );
	}

}


