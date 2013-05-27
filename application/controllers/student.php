<?php

class Student_Controller extends Base_Student_Controller {

	public function get_index()
	{
		//get the student
		$student = Student::theStudent();

		if($student == null)
		{
			//student not found
			return Response::error('404');
		}
		//get the students courses
		$courses = $student->courses()->get();
		
		$this->layout->subtitle = "Student Profile";
		$this->layout->content = View::make('student.index')
		->with('student',$student)
		->with('courses',$courses);

	}
	
	public function get_results()
	{
		return View::make('student.results');
	}
	
	public function get_quizzes()
	{
		//get the student
		$student = Student::theStudent();

		if($student == null)
		{
			//student not found
			return Response::error('404');
		}
		
		$courses = $student->courses()->get();
		
		$this->layout->subtitle = "Student/Attendance";
		$this->layout->content = View::make('student.quizzes')
		->with('student',$student)
		->with('courses',$courses)
		;
	}
	
	public function get_attendance()
	{
		//get the student
		$student = Student::theStudent();

		if($student == null)
		{
			//student not found
			return Response::error('404');
		}
		
		$courses = $student->courses;
		$lessons = $student->lessons;
		
		$this->layout->subtitle = "Student/Attendance";
		$this->layout->content = View::make('student.attendance')
		->with('student',$student)
		->with('courses',$courses)
		->with('lessons',$lessons)
		;
	}

	

	public function get_dl_my_sub()
	{
		$student = Student::theStudent();
		$studentDir = $student->firstname ."." .$student->lastname;
		$directory = path('app').'uploads/'.$studentDir;

		$submissions = scandir($directory,1);
		
		//$filename = "a.jpg";
		//$dlpath = $directory .'/' . $filename;


		// create an array to hold directory list
		$results = array();

    // create a handler for the directory
		$handler = opendir($directory);

    // open directory and walk through the filenames
		while ($file = readdir($handler)) {

      // if file isn't this directory or its parent, add it to the results
			if ($file != "." && $file != "..") {
				$results[] = $directory . '/' . $file;
			}

		}

    // tidy up: close the handler
		closedir($handler);

		//return Response::download($dlpath);

		$this->layout->subtitle = "Student/My Submissions";
		$this->layout->content = View::make('student.submissions')
		->with('results',$results);
	}


	
	
}