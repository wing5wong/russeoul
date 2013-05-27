<?php

class Teacher_Controller extends Base_Teacher_Controller {

	function __construct(){
		parent::__construct();
       
    }


	public function get_index()
	{
		//get the teacher
		$teacher = Teacher::theTeacher();
        if($teacher == null)
		{
			//teacher not found
			return Response::error('404');
		}
        
        //get the teachers courses
		$courses = $teacher->courses()->get();
		
       

        $this->layout->title = "TESOL";
		$this->layout->subtitle = "Teacher Profile";

		$this->layout->content = View::make('teacher.index')
			->with('teacher',$teacher)
			->with('courses',$courses);
        
	}
	
/*	public function get_courses()
	{
		//get the teacher
		$teacher = Teacher::theTeacher();
        if($teacher == null)
		{
			//teacher not found
			return Response::error('404');
		}
        
        //get the teachers courses
		$courses = $teacher->courses()->get();
        
		$this->layout->subtitle = "Teachers Courses";
		$this->layout->content = View::make('teacher.courses')
			->with('teacher',$teacher)
			->with('courses',$courses);
	}*/

	public function get_courses($id)
	{
		//get the teacher
		$teacher = Teacher::theTeacher();
        if($teacher == null)
		{
			//teacher not found
			return Response::error('404');
		}
        
        //get the teachers courses
		$course = $teacher->courses()->where_course_id($id)->first();
		if($course == null)
		{
			//no course found
			return Response::error('404');
		}

		$lessons = $course->lessons()->paginate(9);
		$students = $course->students()->get();
        
		$this->layout->subtitle = "$course->name";
		$this->layout->content = View::make('teacher.courses')
			->with('teacher',$teacher)
			->with('course',$course)
			->with('lessons',$lessons)
			->with('students',$students);
	}
	
	public function get_results()
	{
		return View::make('teacher.results');
	}

}