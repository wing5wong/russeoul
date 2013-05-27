<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('quiz@index','Quiz') }} <span class="divider">/</span></li>
			<li class="active">Create</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
		<h5>Quiz: {{$quiz->name}}</h5>
		
		<ul>
		@foreach($quiz->questions()->get() as $question)
		<li>
			<h2>{{$question->questiontext}}</h2>
			<ul>
				@foreach($question->answers()->get() as $answer)
				<li @if($answer->iscorrect) class="text-success" @else class="text-error" @endif>{{$answer->answertext}}</li>
				@endforeach
			</ul>
		</li>
		@endforeach
		</ul>
	</div>
	</div>
</div>
