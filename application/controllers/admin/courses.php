<?php

class Admin_Courses_Controller extends Base_Admin_Controller {
	
	public function get_index()
	{
		$courses =  Course::paginate(10);
		
		$this->layout->subtitle = "Admin/Courses";
		$this->layout->content = View::make('admin.courses')
		->with('courses',$courses);
	}
	

	public function get_details($id)
	{
		$course = Course::find($id);
		$students = $course->students;
		$teachers = $course->teachers;
		
		$this->layout->subtitle = "Admin/Courses/Details";
		$this->layout->content = View::make('admin.courses.view')
		->with('course',$course)
		->with('students',$students)
		->with('teachers',$teachers);
	}
	
	public function post_details($id)
	{
		$course = Course::find($id);
		
		if(Input::has('save'))
		{
			$course->fill( Input::except('save') );
			$course->save();
			
			return Redirect::to_action("admin.courses@details/$course->id");
		}
		elseif(Input::has('delete'))
		{
			$course->delete();
			return Redirect::to_action('admin.courses@index');
		}
		return Redirect::to_action('admin.courses@index');
		
	}
	
	public function get_create()
	{
		$this->layout->subtitle = "Admin/Courses/Create";
		$this->layout->content = View::make('admin.courses.create');
	}

	public function post_create(){
		
		$course = new Course;
		$course->fill( Input::get() );
		$course->save();
		
		$teachers = Teacher::all();
		foreach($teachers as $teacher)
		{
			$course->teachers()->attach($teacher->id);
		}
		
		return Redirect::to_action("admin.courses@details/$course->id");
		
	}
}