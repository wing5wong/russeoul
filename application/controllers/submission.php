<?php

class Submission_Controller extends Base_Controller {

	

	public function get_view($id)
	{ 
		$student = Student::theStudent();
		$submissions = $student->submissions()->get();
		if($student == null)
		{
			//student not found
			
			return Response::error('404');
		}

		$submission = $student->submissions()->where_id($id)->first();
		return Response::download(path('app').'uploads/' . $submission->location) ;

	}

}

