<?php

class Create_Lessons {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('lessons', function($table)
		{
			$table->increments('id');
			//$table->date('date');
			$table->string('name');
			$table->integer('course_id')->unsigned();
			
			$table->timestamps();
			
			$table->foreign('course_id')->references('id')->on('courses')->on_delete('restrict')->on_update('restrict');
		
		});
		
		
		/*$lesson = new Lesson;
		$format = 'Y-m-d';
		$date = DateTime::createFromFormat($format, '2013-01-21');
		$lesson->date = $date;
		$lesson->course_id = 1;
		$lesson->timestamp();
		$lesson->save();
        
        $lesson2 = new Lesson;
		$format2 = 'Y-m-d';
		$date2 = DateTime::createFromFormat($format2, '2013-01-21');
		$lesson2->date = $date2;
		$lesson2->course_id = 1;
		$lesson2->timestamp();
		$lesson2->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('lessons' );
	}

}