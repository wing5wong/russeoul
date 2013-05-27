<?php

class Create_Course_Teacher {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('course_teacher', function($table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('course_id')->references('id')->on('courses')->on_delete('cascade')->on_update('cascade');
			
			$table->foreign('teacher_id')->references('id')->on('teachers')->on_delete('cascade')->on_update('cascade');
		});
		
		
		/*$teacher = Teacher::find(1);
		$teacher->courses()->attach(1);*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('course_teacher' );
	}

}


