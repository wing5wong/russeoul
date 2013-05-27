<?php

class Feedbacks {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('feedbacks', function($table)
		{
			$table->increments('id');
			$table->integer('submission_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->text('comment');
			$table->timestamps();
            
            
            $table->foreign('teacher_id')->references('id')->on('teachers')->on_delete('cascade')->on_update('cascade');
            $table->foreign('submission_id')->references('id')->on('submissions')->on_delete('cascade')->on_update('cascade');
		
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
		Schema::drop('feedbacks' );
	}

}