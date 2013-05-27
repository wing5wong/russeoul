
		{{ HTML::link('/','Home') }} &nbsp;&nbsp;
		{{ HTML::link('quizzes/add','Add Quiz') }}
{{ Form::open() }}
		<h2>Quizzes List</h2>
		<ul>
			@forelse($quizzes as $quiz)
			{{$quiz->id}}
			{{ Form::hidden('quizid',$quiz->id)}}
			<li>
				<h2>{{ $quiz->name }}</h2>
				<ul>
					@forelse($quiz->questions as $question)
					<li>
						{{$question->questiontext }}
						<ul>
							
							<li>
								@if($question->questiontype->type == "singleChoice")
									@foreach($question->answers as $answer)
									<label for="{{$question->id}}" class="radio"><input type="radio" value="{{$answer->answertext}}" name="{{$question->id}}" />{{ $answer->answertext }} </label>
									@endforeach

								@elseif($question->questiontype->type == "multipleChoice")
									@foreach($question->answers as $answer)
									<label for="{{$question->id}}" class="checkbox"><input type="checkbox" value="{{$answer->answertext}}" name="{{$question->id}}[]" />{{ $answer->answertext }} </label>
									@endforeach

								@elseif($question->questiontype->type == "shortAnswer")
								<input type="text" name="{{$question->id}}" />
								@endif
							</li>
						</ul>
					</li>
					@empty
					<li>no questions in this quiz</li>
					@endforelse
				</ul>

			</li>
			@empty
			<li>no quizzes</li>
			@endforelse
		</ul>
		{{Form::submit('submit')}}
		{{ Form::close() }}
