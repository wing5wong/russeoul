<?php

class Student_Submission_Controller extends Base_Student_Controller {

	public function get_index()
	{
		//get the student
		$student = Student::theStudent();

		if($student == null)
		{
			//student not found
			return Response::error('404');
		}

		$this->layout->subtitle = "Student/Submission";
		$this->layout->content = View::make('student.submission')
		->with('student',$student);
	}

	public function get_list()
	{
		$student = Student::theStudent();
		$submissions = $student->submissions()->with('feedback')->get();
		if($student == null)
		{
			//student not found
			return Response::error('404');
		}

		$this->layout->subtitle = "Student/My Submissions";
		$this->layout->content = View::make('student.submissions.list')
		->with('student',$student)
		->with('submissions',$submissions);

	}

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


	public function post_submission()
	{
		$student = Student::theStudent();
		$studentDir = $student->firstname ."." .$student->lastname;
		$directory = path('app').'uploads/'.$studentDir;


		$input = Input::all();
		$extension = File::extension($input['photo']['name']);


        //$filename = sha1(Auth::user()->id.time()).".{$extension}";
		// Todo: actual filename = random hash value.
		//			store desired filename in db seperately


		$filename = time() . "-". $input['photo']['name'];

		$upload_success = Input::upload('photo', $directory, $filename);
		if( $upload_success ) {
			Session::flash('status_success', 'Successfully uploaded new Instapic');
		} else {
			Session::flash('status_error', 'An error occurred while uploading new Instapic - please try again.');
		}
		if( $upload_success ) {
           // $photo = new Photo(array(
			$submission = new Submission(array(
				'location' => $studentDir . '/' . $filename,
				'name' => $input['name']
				));
           //     'location' => URL::to('uploads/'.sha1(Auth::user()->id).'/'.$filename),
           //     'description' => $input['description']
           // ));
			$student->submissions()->insert($submission);
           // Auth::user()->photos()->insert($photo);
		}
		return Redirect::to('student');
	}

}

