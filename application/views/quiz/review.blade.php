<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('quiz@index','Quiz') }} <span class="divider">/</span></li>
			<li class="active">Create</li>
		</ul>
	</div>
</div>

@if($quiz !== null)
<div class="row">
	<div class="span12">
		<div class="alert alert-warning">
			<p>looks like you have a quiz in progress: {{$quiz->id}}</p>
			<p>here's what you've got so far</p>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="span12">
		<div class="well">
			<?php $quiz =Session::get('quiz'); ?>
			<h4>{{$quiz->name}}</h4>
			<p><em>{{$quiz->instructions}}</em></p>
			<ul>
			@forelse( $quiz->questions()->get() as $question )
			<li>{{ $question->questiontext }}</li>
			</ul>
			@empty
			<p class="text-error"> looks like you havent even started</p>
			<p>why dont you start now?</p>
			{{HTML::link('quiz/question/add', 'Add a question',array('class'=>'btn btn-success'))}}
			@endforelse
		</div>
	</div>
</div>
