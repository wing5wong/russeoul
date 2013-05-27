<?php

class Student extends Eloquent
{
	public static $timestamps = true;

	public function courses()
	{
		return $this->has_many_and_belongs_to('Course');
	}
	
	public function lessons()
	{
		return $this->has_many_and_belongs_to('Lesson')->with('present');
	}

    public function questions()
    {
        return $this->has_many_and_belongs_to('Question')
                        ->with('givenanswer')
                        ->with('correctansweroverride');
    }

    public function quizzes()
    {
        return $this->has_many_and_belongs_to('Quiz');
    }
    

    public function submissions()
    {
        return $this->has_many('Submission');
    }


    public function user()
    {
        return $this->belongs_to('User');
    }
    
    
    public static function theStudent(){
        $user = Auth::user()->student()->first();
        
        if($user != null){
            $student = Student::find($user->id);
            
            if($student != null)
            {
                return $student;
            }
            else
            {
                return null;
            }
        }
        
        
    }
	
}



