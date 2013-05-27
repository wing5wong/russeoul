<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('student@index','Student') }} <span class="divider">/</span></li>
			<li class="active">Results</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<h4>Quizzes</h4>
		<ul class="unstyled">
			<li class="alert alert-success">
				{{HTML::link('student/results/quizzes/1','Quiz 1: 85%') }}
			</li>
			<li class="alert alert-success">
				Quiz 2: 85%
			</li>
			<li class="alert alert-success">
				Quiz 3: 85%
			</li>
			<li class="alert alert-success">
				Quiz 4: 85%
			</li>
			<li class="alert alert-success">
				Quiz 5: 85%
			</li>
			<li class="alert alert-error">
				Quiz 6: 45%
			</li>
		</ul>
		Overall result: 85%  (A)
		
		<h4>Lesson Delivery</h4>
		<ul class="unstyled">
			<li class="alert alert-success">
				{{HTML::link('student/results/lesson_plans/1','Lesson 1: Pass') }}
			</li>
			<li class="alert alert-success">
				Lesson 2: Pass
			</li>
			<li class="alert alert-info">
				Lesson 3: Not Marked
			</li>
			<li class="alert alert-warning">
				Lesson 4: Not Yet Delivered
			</li>
			<li class="alert alert-warning">
				Lesson 5: Not Yet Delivered
			</li>
			<li class="alert alert-warning">
				Lesson 6: Not Yet Delivered
			</li>
		</ul>
		
		<h4>Portfolio </h4>
		<ul class="unstyled">
			<li class="alert alert-warning">
				Not Yet Delivered
			</li>
		</ul>
	</div>
</div>