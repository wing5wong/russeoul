<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('teacher@index','Teacher') }} <span class="divider">/</span></li>
			<li class="active">Feedback</li>
		</ul>
	</div>
</div>
@forelse($students as $student)
<div class="row">
	<div class="span3">
		<div class="well">
		{{$student->firstname}}{{$student->lastname}}
</div>
		<br>
	</div>
	<div class="span9">
		<div class="well">
			<ol>
		@forelse($student->submissions as $submission)
		<li>
		<ul class="icons">
			<li><i class="icon-ok"></i><strong>Submission: </strong>{{HTML::link("/teacher/submission/view/$submission->id",$submission->name)}}</li>
			<li><i class="icon-comments-alt"></i><strong>Submission feedback: </strong>
				<ul class="unstyled">
					@forelse($submission->feedback as $f)
					<li><blockquote><em>{{$f->comment}}</em> - <cite>{{$f->teacher->firstname}}</cite></blockquote></li>
					@empty
					@endforelse
				</ul>
			</li>

		</ul>	
		</li>
		@empty
		<p class="text-warning">Nothing submitted yet.</p>
		@endforelse

	</ol>
		</div></div></div>
		@empty
	</div>
</div>
@endforelse
