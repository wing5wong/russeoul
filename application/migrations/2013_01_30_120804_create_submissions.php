<?php

class Create_Submissions {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('submissions', function($table)
		{
			$table->increments('id');
			$table->string('location');
			$table->string('name');
            $table->integer('student_id')->unsigned();
			$table->timestamps();
            
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
		Schema::drop('submissions' );
	}

}