<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('student@index','Student') }} <span class="divider">/</span></li>
			<li class="active">Quizzes</li>
		</ul>
	</div>
</div>
@forelse($courses as $course)
<div class="row">
	<div class="span4">
		<div class="well">
			<strong>Course: </strong>{{ $course->name }}
		</div>
	</div>
	<div class="span8">
		
		<div class="well">
			<ul class="icons">
				@forelse($course->quizzes as $quiz)
				<li><i class="icon-book"></i> 
					<strong>Quiz Name:</strong> {{HTML::link("student/quizzes/attempt/$quiz->id", $quiz->name)}}
				</li>
			</ul>
		</div>	
		@empty
		No Quizzes For This Course

		@endforelse

	</div>
</div>
@empty
No Course
@endforelse