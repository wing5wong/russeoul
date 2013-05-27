
{{ HTML::link('/','Home') }} &nbsp;&nbsp;
{{ HTML::link('quizzes/add','Add Quiz') }}
<h2>Quizzes List</h2>
thanks, your submission was recieved
<br><br>
The correct answers were:<br>
@foreach($attempt->quiz->questions as $question)
{{$question->questiontext}}
<ul>
	@foreach($question->answers()->where_iscorrect('1')->get() as $answer)
	<li>the correct answer was: {{$answer->answertext}}</li>
	<li class="youranswer">you wrote:    
		@foreach($attempt->questions()->where_question_id($question->id)->get() as $result)
			@if(is_array($result))
			its anarray
			@endif
		{{$result->pivot->givenanswer}}
		@endforeach
	</li>
	@endforeach
</ul>
@endforeach

