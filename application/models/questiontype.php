<?php

class Questiontype extends Eloquent
{
	CONST SINGLECHOICE = "singleChoice";
	CONST MULTIPLECHOICE = "multipleChoice";
	CONST SHORTANSWER = "shortAnswer";

	public static $timestamps = true;

	public function question()
	{
		return $this->has_one('Question');
	}
	 
}



