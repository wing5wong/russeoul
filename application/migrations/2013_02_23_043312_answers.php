<?php

class Answers {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('answers', function($table)
		{
			$table->increments('id');
			$table->string('answerText');
			$table->boolean('isCorrect');
			$table->integer('question_id')->unsigned();
			$table->timestamps();

			$table->foreign('question_id')->references('id')->on('questions')->on_delete('cascade')->on_update('cascade');
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
		Schema::drop('answers' );
	}

}