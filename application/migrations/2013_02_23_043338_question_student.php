<?php

class Question_Student {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('question_student', function($table)
		{
			$table->increments('id');
			$table->string('givenAnswer');
			$table->boolean('correctAnswerOverride');
			$table->integer('question_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->timestamps();

			$table->foreign('question_id')->references('id')->on('questions')->on_delete('cascade')->on_update('cascade');
			
			$table->foreign('student_id')->references('id')->on('students')->on_delete('cascade')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('question_student' );
	}

}