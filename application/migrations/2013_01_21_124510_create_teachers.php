<?php

class Create_Teachers {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('teachers', function($table)
		{
			$table->increments('id');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
            $table->integer('user_id')->unsigned();
			$table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->on_delete('cascade')->on_update('cascade');
		});
		
		/*$teacher = new Teacher;
		$teacher->firstName = "Russell";
		$teacher->lastName = "Anderson";
		$teacher->email = 'russell.ginue@gmail.com';
		$teacher->phone = '0210677905';
        $teacher->user_id = '2';
		$teacher->timestamp();
		$teacher->save();
        
        $teacherAdmin = new Teacher;
		$teacherAdmin->firstName = "admin";
		$teacherAdmin->lastName = "Anderson";
		$teacherAdmin->email = 'russell.ginue@gmail.com';
		$teacherAdmin->phone = '0210677905';
        $teacherAdmin->user_id = '3';
		$teacherAdmin->timestamp();
		$teacherAdmin->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('teachers' );
	}

}