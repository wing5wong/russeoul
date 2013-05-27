<?php

class Teacher extends Eloquent
{
	public static $timestamps = true;

    public function delete()
    {

        $this->user()->delete();
    }

	public function courses()
	{
		return $this->has_many_and_belongs_to('Course');
	}
	
    public function feedback()
    {
        return $this->has_many('Feedback');
    }

	public function user()
    {
        return $this->belongs_to('User');
    }
    
    public static function theTeacher(){
        return Auth::user()->teacher;

        /*$user = Auth::user()->teacher()->first();
        
        if($user != null){
            $teacher = Teacher::find($user->id);
            
            if($teacher != null)
            {
                return $teacher;
            }
            else
            {
                return null;
            }
        }
        */
        
    }
}



