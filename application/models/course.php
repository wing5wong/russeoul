<?php

class Course extends Eloquent
{
	public static $timestamps = true;

	public function students()
	{
		return $this->has_many_and_belongs_to('Student');
	}
	
	public function teachers()
	{
		return $this->has_many_and_belongs_to('Teacher');
	}
	
	public function lessons()
     {
          return $this->has_many('Lesson');
     }
	 
	 public function quizzes()
	{
		return $this->has_many_and_belongs_to('Quiz');
	}
	 
}



