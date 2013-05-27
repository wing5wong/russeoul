<?php

class Teacher_Submission_Controller extends Base_Teacher_Controller {

	

	public function get_download($id)
	{ 
		$submission = Submission::where_id($id)->first();
		$student = $submission->student;
		return Response::download(path('app').'uploads/' . $submission->location,$student->firstname . $student->lastname . "-" . $submission->name) ;

	}

	public function get_view($id)
	{

		$submission = Submission::where_id($id)->first();

		$this->layout->subtitle = "Teacher/ Submission Feedback";
		$this->layout->content = View::make('teacher/submissions/view')
		->with('submission',$submission);
	}

}

