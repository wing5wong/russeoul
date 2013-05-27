<?php

class Create_Role_User {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('role_user', function($table)
		{
            $table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			
			
			$table->foreign('role_id')->references('id')->on('roles')->on_delete('cascade')->on_update('cascade');
			
			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade')->on_update('cascade');
		});
		
		
        /*// roles for 1st user (student)
		$user_student = User::find(1);
            // student role
            $user_student->roles()->attach(1);
        
        // roles for 2nd user (teacher)
		$user_teacher = User::find(2);
            // teacher role
            $user_teacher->roles()->attach(2);
            
        // roles for 2nd user (teacher)
		$user_admin = User::find(3);   
            // admin role
            $user_admin->roles()->attach(3);*/
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('role_user' );
	}

}