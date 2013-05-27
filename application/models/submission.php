<?php

class Submission extends Eloquent
{
	public static $timestamps = true;

	public function student()
	{
		return $this->belongs_to('Student');
	}

    public function feedback()
    {
        return $this->has_many('Feedback');
    }
	
	
}



