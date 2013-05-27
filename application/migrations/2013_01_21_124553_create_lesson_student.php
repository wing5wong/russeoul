<?php

class Create_Lesson_Student {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('lesson_student', function($table)
		{
			$table->increments('id');
			$table->integer('lesson_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->boolean('present');
			$table->date('date');
			$table->timestamps();
			
			$table->foreign('lesson_id')->references('id')->on('lessons')->on_delete('cascade')->on_update('cascade');
			$table->foreign('student_id')->references('id')->on('students')->on_delete('cascade')->on_update('cascade');
		});
		
		
		/*$student = Student::find(1);
		$student->lessons()->attach(1,array('present'=>'1'));
        $student->lessons()->attach(2,array('present'=>'0'));*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('lesson_student' );
	}

}


