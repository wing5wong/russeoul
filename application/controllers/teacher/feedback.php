<?php

class Teacher_Feedback_Controller extends Base_Teacher_Controller {

	public function get_index()
	{
		$students = Student::with('submissions','submissions.feedback')->get();
		$this->layout->subtitle = "Teacher/ Feedback";
		$this->layout->content = View::make('teacher.feedback.index')->with('students',$students);
	}

	public function post_comment()
	{
		$teacher = Teacher::theTeacher();

		$submission = Submission::find(Input::get('submissionID'));

		$feedback = new Feedback(array(
			'comment' =>  Input::get('comment'),
			'teacher_id' => $teacher->id,
			'submission_id' => $submission->id,
			)
		);

		//$feedback->teacher()->insert($teacher);
		//$feedback->submission()->insert($submission);
		
		$feedback->save();

		return Redirect::to_action('teacher@feedback');
	}
}
