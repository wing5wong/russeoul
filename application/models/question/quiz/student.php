<?php

class Question_Quiz_Student extends Eloquent
{
	public static $timestamps = true;

	public static $table = "Question_Quiz_Student";

	public function question()
	{
		return $this->belongs_to("Question" );
	}

	public function quiz_student()
	{
		return $this->belongs_to('Quiz_Student');
	}

}