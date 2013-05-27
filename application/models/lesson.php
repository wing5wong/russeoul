<?php

class Lesson extends Eloquent
{
	public static $timestamps = true;

	public function students()
	{
		return $this->has_many_and_belongs_to('Student')->with('present')->with('date');
	}
	
	public function course()
	{
		return $this->belongs_to('Course');
	}
}



