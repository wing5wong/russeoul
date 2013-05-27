<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('teacher@index','Teacher') }} <span class="divider">/</span></li>
			<li class="active">Course: {{ $course->name }}</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="course-heading">
		<h3>{{ $course->name }}</h3>
	</div>
	</div>
</div>
<div class="row">
	<div class="span4">
		<div class="well">
			<h5>Students</h5>

			<ul class="nav nav-tabs nav-stacked">
				@forelse($students as $student)
				<li>
					{{ HTML::link("teacher/students/details/$student->id","$student->firstname $student->lastname") }}

				</li>

				@empty

				<li>There are no students enrolled in this course</li>

				@endforelse
			</ul>
		</div>
	</div>

	<div class="span4">
		<div class="well">
			<h5>Lessons</h5>
			<ul class="nav nav-tabs nav-stacked">
				@forelse($lessons->results as $lesson)
				<li>{{ HTML::link("teacher/lessons/details/$lesson->id",$lesson->name) }}</li>

				@empty

				<li>There are no lessons created for this course</li>

				@endforelse
			</ul>
			{{ $lessons->links() }}
		</div>
	</div>

	<div class="span4">
        <div class="well">
            <h5>Course Resources</h5>
            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a href="#">some sample</a>
                </li>
                <li>
                    <a href="#">course resources</a>
                </li>
                <li>
                    <a href="#">can be found</a>
                </li>
                <li>
                    <a href="#">here</a>
                </li>
            </ul>
        </div>
    </div>
</div>