<?php

class Quiz extends Eloquent
{
	public static $timestamps = true;

	public function courses()
	{
		return $this->has_many_and_belongs_to('Course');
	}
	
	public function questions()
	{
		return $this->has_many('Question');
	}

	public function quiz_students()
	{
		return $this->has_many('Quiz_Students');
	}
	
}



