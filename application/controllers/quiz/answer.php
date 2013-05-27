<?php

class Quiz_Answer_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function get_add()
	{
		if(Session::has('question'))
		{
			$question = Session::get('question');
			$questiontype = Questiontype::find($question->questiontype_id);
			$questiontype = $questiontype->type;

			Session::put('questiontype',$questiontype);

			$this->layout->subtitle = "Quiz/Answer/Add";
			$this->layout->content = View::make('quiz.answers.create');

		}
		else{
			return Response::error('500');
		}
	}

	public function post_add()
	{
		$question = Session::get('question');

		for($i = 1; $i<=(sizeOf( Input::except('correctanswer'))); $i++)
		{

			$nameCount = "a".$i;

			// SingleChoice or Short Answer
			if($question->questiontype->type !== Questiontype::MULTIPLECHOICE)
			{
				$answer = Answer::create(
					array(
						'answerText'=> Input::get($nameCount),
						'isCorrect'=> Input::get('correctanswer') == $i ? 1 : 0,
						'question_id'=>$question->id,
						)
					);
			}
			// Multiple Choice
			else{
				foreach(Input::get('correctanswer') as $ca)
				{
					$answer = Answer::create(
					array(
						'answerText'=> Input::get($nameCount),
						'isCorrect'=> Input::get('correctanswer') == $i ? 1 : 0,
						'question_id'=>$question->id,
						)
					);
				}
			}
		}
		return Redirect::to('quiz/question/add');
	}

}

