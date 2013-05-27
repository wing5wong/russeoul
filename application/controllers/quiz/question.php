<?php

class Quiz_Question_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function get_add()
	{
		if(Session::has('quiz'))
		{
			$quiz = Session::get('quiz');
			$questiontypes = Questiontype::all();

			$this->layout->subtitle = "Quiz/Question/Add";
			$this->layout->content = View::make('quiz.questions.create')
			->with('quiz',$quiz)
			->with('questiontypes',$questiontypes);
		}
		else{
			return Response::error('500');
		}
	}

	public function post_add()
	{
		$quiz = Input::get('quiz');
		$data = Input::all();
		$rules = array(
			'questiontext' => 'required',
			'questiontype' => 'required',
			);

		$validation = Validator::make($data, $rules);

		if ($validation->fails())
		{
			return Redirect::to('quiz/question/add')
			->with('quiz',Quiz::find($quiz))
			->with_errors($validation)
			->with_input();
		}
		else
		{
			$question = Question::create(
				array(
					'questiontext' => Input::get('questiontext'),
					'questiontype_id' => Input::get('questiontype'),
					'quiz_id' => Input::get('quiz'),
					)
				);

			Session::put('question', $question);

			return Redirect::to('quiz/answer/add');
		}
	}


}

