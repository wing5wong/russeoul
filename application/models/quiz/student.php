<?php

class Quiz_Student extends Eloquent
{
	public static $timestamps = true;
	public static $table = "Quiz_Student";

	public function quiz()
	{
		return $this->belongs_to("Quiz" );
	}

	public function student()
	{
		return $this->belongs_to('Student');
	}

	public function questions()
	{
		return $this->has_many_and_belongs_to('Question')
		->with('givenanswer')
		->with('correctansweroverride');
	}
}