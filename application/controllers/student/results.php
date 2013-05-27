<?php

class Student_Results_Controller extends Base_Student_Controller {

	public function get_index()
	{
		
		$this->layout->subtitle = "Student/Results";
		$this->layout->content = View::make('student.results');

	}
	
	public function get_lesson_plans($id)
	{
		$this->layout->subtitle = "Student/Results/Lesson Plans";
		$this->layout->content = View::make('student.results.lesson_plans')->with('lessonID',$id);
		
	}
	
	public function get_quizzes($id)
	{
		return View::make('student.results.quizzes')
		->with('quizID',$id);
	}
	
	public function get_report()
	{
		$this->layout->subtitle = "Student/Results/Report";
		$this->layout->content = View::make('student.results.report');
	}

}