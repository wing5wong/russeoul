<?php

class Question extends Eloquent
{
	public static $timestamps = true;

	public function quiz()
	{
		return $this->belongs_to('Quiz');
	}

	public function questiontype()
	{
		return $this->belongs_to('Questiontype');
	}

	public function students()
	{
		return $this->has_many_and_belongs_to('Student')
                        ->with('givenanswer')
                        ->with('correctansweroverride');
	}

	public function answers()
	{
		return $this->has_many('Answer');
	}

		public function quiz_students()
	{
		return $this->has_many_and_belongs_to('Quiz_Student')
		->with('givenanswer')
		->with('correctansweroverride');
	}
	
}



