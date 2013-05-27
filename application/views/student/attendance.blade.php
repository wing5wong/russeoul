
<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('student@index','Student') }} <span class="divider">/</span></li>
			<li class="active">Attendance</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="span12">
		@forelse($courses as $course)
		<h5>{{ $course->name }} </h5>
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>
						Date
					</th>
					<th class="td-centered">
						Present / Absent
					</th>
				</tr>
			</thead>
			<tbody>
				@forelse($course->lessons()->join('lesson_student','lesson_id','=','lessons.id')->join('students','lesson_student.student_id','=','students.id')->order_by('course_id')->where('students.id','=',$student->id)->paginate(10)->results as $attendance)
				<tr>
					<td>
						{{ $attendance->date }}
					</td>
					<td class="td-centered"><span class="add-on"><i class="icon-large @if($attendance->present == 1) icon-ok-circle text-success @else icon-remove-circle text-error@endif"></i></span>
					</td>
				</tr>
				@empty
				<tr>
					<td>No lessons for this course</td>
				</tr>
				@endforelse
			</tbody>
		</table>
		{{ $course->lessons()->join('lesson_student','lesson_id','=','lessons.id')->join('students','lesson_student.student_id','=','students.id')->order_by('course_id')->where('students.id','=',$student->id)->paginate(10)->links() }}
		<br><br>
		@empty
		<p>No Attendance records for this student</p>
		@endforelse
	</div>
</div>