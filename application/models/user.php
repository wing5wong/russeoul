<?php

class User extends Eloquent
{
	public static $timestamps = true;

	public function student()
	{
		return $this->has_one('Student');
	}
	
	public function teacher()
	{
		return $this->has_one('Teacher');
	}
	
    public function roles()
	{
		return $this->has_many_and_belongs_to('Role');
	}
}



