<?php

class Create_Students {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('students', function($table)
		{
			$table->increments('id');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('koreanFirstName');
			$table->string('koreanLastName');
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
            $table->integer('user_id')->unsigned();
			$table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->on_delete('cascade')->on_update('cascade');
		
		});
		
		
		/*$student = new Student;

		$student->firstName = "Sean";
		$student->lastName = "Anderson";
		$student->koreanFirstName = "Sean";
		$student->koreanLastName = "Anderson";
		
		$student->email = 'wing5wong@hotmail.com';
		$student->phone = '0210677905';
        
        $student->user_id = '1';
        
		$student->timestamp();

		$student->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('students' );
	}

}