<?php

class Feedback extends Eloquent
{
	public static $timestamps = true;

	public function submission()
	{
		return $this->belongs_to('Submission');
	}
	
	public function teacher()
	{
		return $this->belongs_to('Teacher');
	}
	 
}



