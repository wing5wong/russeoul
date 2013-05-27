<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table)
		{
			$table->increments('id');
            $table->string('username')->unique();
			$table->string('password', 64);
            $table->boolean('active');
			$table->timestamps();
		
		});
		
		//student user
		/*$user_student = new User;
		$user_student->username = "student";
		$user_student->password = Hash::make('password');
		$user_student->timestamp();
		$user_student->save();
        
        //teacher_user
        $user_teacher = new User;
		$user_teacher->username = "teacher";
		$user_teacher->password = Hash::make('password');
		$user_teacher->timestamp();
		$user_teacher->save();
        
        //teacher_user
        $user_admin = new User;
		$user_admin->username = "admin";
		$user_admin->password = Hash::make('password');
		$user_admin->timestamp();
		$user_admin->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users' );
	}

}