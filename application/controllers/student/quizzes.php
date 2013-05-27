<?php

class Student_Quizzes_Controller extends Base_Student_Controller {

	public function get_index()
	{
		$courses = Student::theStudent()->courses;
		$this->layout->subtitle = "Student/Quizzes";
		$this->layout->content = View::make('student.quizzes')
		->with('courses',$courses);

	}
}