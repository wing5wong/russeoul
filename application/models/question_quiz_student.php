<?php

class Question_Quiz_Student extends Eloquent
{
	public static $timestamps = true;

	public function question()
	{
		return $this->belongs_to("Question" );
	}

	public function quiz_student()
	{
		return $this->belongs_to('Quiz_Student');
	}

	public function question_quiz_students()
	{
		return $this->has_many_and_belongs_to('Question_Quiz_Student');
	}
}