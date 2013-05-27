<?php

class Create_Courses {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('courses', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description')->nullable();
			$table->timestamps();
		});
		
		
		/*$course = new Course;
		$course->name = "Test Course";
		$course->description = "Just testing a course";
		$course->timestamps();
		$course->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('courses' );
	}

}
