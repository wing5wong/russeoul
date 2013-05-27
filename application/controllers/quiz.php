<?php

class Quiz_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function get_create()
	{
		//is there already a quiz being created?
		$quiz = Session::has('quiz') ? Session::get('quiz') : null;

		
		if( $quiz )
		{
			$this->layout->content = View::make('quiz.review')
			->with('quiz', $quiz);	
		}
		else{
			$this->layout->content = View::make('quiz.create');
		}
	}

	public function post_create()
	{

		$data = Input::all();
		$rules = array(
			'name' => 'required',
			);

		$validation = Validator::make($data, $rules);

		if ($validation->fails())
		{
			return Redirect::to('quiz/create')
			->with_errors($validation)
			->with_input();
		}
		else{
			$name = Input::get('name');
			$instructions = Input::get('instructions');

			$quiz = Quiz::create(
				array(
					'name'=> $name,
					'instructions' => $instructions,
					)
				);

			Session::put('quiz', $quiz);

			return Redirect::to('quiz/question/add');
		}
	}

	public function get_index()
	{
		$quizzes = Quiz::all();

		$this->layout->content = View::make('quiz.index')
		->with('quizzes',$quizzes);
	}

	public function post_index()
	{
		// get the student id
		$student = Student::theStudent();

		//get the quiz id
		$quiz = Quiz::find(Input::get('quizid'));

		//create a new quiz attempt (quiz_student)
		$attempt = Quiz_Student::create(
			array(
				'quiz_id' => $quiz->id,
				'student_id' => $student->id
				)
			);

		//get the inputted answers for the questions
		foreach($quiz->questions as $question)
		{
			$studentAnswer = Input::get($question->id);

			//handle checkbox answers
			if(is_array($studentAnswer))
			{
				//loop through the array and create new entry for each checkbox
				foreach($studentAnswer as $sa)
				{
					$qqs = Question_Quiz_Student::create(
						array(
							'quiz_student_id' => $attempt->id,
							'question_id' => $question->id,
							'givenAnswer' => $sa
							)
						);
				}
			}
			else
			//handle input text and radios
			{
				$qqs = Question_Quiz_Student::create(
					array(
						'quiz_student_id' => $attempt->id,
						'question_id' => $question->id,
						'givenAnswer' => $studentAnswer
						)
					);
			}
		}
		
		//put the attempt into the session
		Session::put('attempt',$attempt);
		return Redirect::to("quiz/result");

	}

	public function get_view($id)
	{
		$quiz = Quiz::find($id);
		$this->layout->content = View::make('quiz.view')
		->with('quiz',$quiz);
	}

	public function get_result()
	{
		//get the attempt from the session
		$attempt = Session::get('attempt');

		//get the logged in student
		$student = Student::theStudent();

		//lame way of making sure this quiz result is only visible to the right student...
		$studentsAttempt = $student->quizzes()->pivot()->where('id','=',$attempt->id)->first();
		//didnt find an entry. this attempt id does not belong to the logged in student
		if($studentsAttempt == null)
		{
			return Response::error('404');
		}

		$this->layout->content = View::make('quiz.results')
		->with('attempt',$attempt);
	}
}