<?php

class Create_Roles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('roles', function($table)
		{
			$table->increments('id');
            $table->string('name')->unique();
			$table->timestamps();
		
		});
		
		
        /*//student role
		$role_student = new Role;
		$role_student->name = "Student";
		$role_student->timestamp();
		$role_student->save();
        
        //teacher role
        $role_teacher = new Role;
        $role_teacher->name = "Teacher";
		$role_teacher->timestamp();
		$role_teacher->save();
        
        //admin role
        $role_admin = new Role;
        $role_admin->name = "Admin";
		$role_admin->timestamp();
		$role_admin->save();*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('roles' );
	}

}