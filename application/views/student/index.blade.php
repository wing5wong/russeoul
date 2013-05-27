<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li class="active">Student</li>
        </ul>
    </div>
</div>
@if (Session::has('login_type'))
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>

	<p><strong>Woops!</strong> You appear to be a {{ Session::get('login_type') }}, so we brought you here!</p>	
	<p>Don't want to be here? {{ HTML::link_to_action('login@index','Login as a different user') }} or {{ HTML::link_to_action('login@logout','Logout') }}</p>	
</div>
@endif 
<div class="row">
	<div class="span3">
		<div class="well">
		<img src="<?php echo 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( "$student->email" ) ) ) . '?s=100&amp;r=pg'?>"  class="img-polaroid" />
		<h5>Name: <small>{{ $student->firstname }} {{ $student->lastname }}</small></h5>
		<h5>Class: 
			<ul class="unstyled">
				@forelse($courses as $course)
				<li><small>{{ $course->name }}</small></li>
				@empty
				<li><small>---</small></li>
				@endforelse
			</ul>
		</h5>
	</div>
	</div>
	<div class="span9">
		<div class="well">
		<ul class="nav nav-tabs nav-stacked">
			<li>
				{{ HTML::link('student/quizzes','Available Quizzes') }}
			</li>
			<li>
				{{ HTML::link('student/results','My Results') }}
			</li>
			<li>
				{{ HTML::link('student/attendance','My Attendance') }}
			</li>
			<li>
				{{ HTML::link('student/results/report','Final Report') }}
			</li>
			<li>
				{{ HTML::link('student/submission','Submit a file') }}
			</li>
			<li>
				{{ HTML::link('student/submission/list','view my submissions') }}
			</li>

		</ul>
	</div>
	</div>
</div>