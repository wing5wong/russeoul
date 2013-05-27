<?php

class Create_Course_Student {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('course_student', function($table)
		{
            $table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->timestamps();
			
			
			$table->foreign('course_id')->references('id')->on('courses')->on_delete('cascade')->on_update('cascade');
			
			$table->foreign('student_id')->references('id')->on('students')->on_delete('cascade')->on_update('cascade');
		});
		
		
		/*$student = Student::find(1);
		$student->courses()->attach(1);*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('course_student' );
	}

}


