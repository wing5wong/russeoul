<?php

class Teacher_Students_Controller extends Base_Teacher_Controller {

	public function get_index()
	{
		return View::make('teacher.students.index');
	}

    public function get_details($id)
    {

        $student = Student::find($id);

        if($student == null)
        {
            //student not found
            return Response::error('404');
        }
        $this->layout->subtitle = "Student: $student->firstname $student->lastname";
        $this->layout->content = View::make('teacher.students.details')
        ->with('student',$student);
    }
}