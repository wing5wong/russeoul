<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li class="active">Courses</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>
							Course Name
						</th>
						<th>
							Course Description
						</th>
						<th>
							Actions
						</th>
					</tr>
				</thead>
				<tbody>
					@forelse($courses->results as $course)
					<tr>
						<td>
							{{ $course->name }}
						</td>
						<td>
							{{ $course->description }}
						</td>
						<td>
							{{ HTML::link("admin/courses/details/$course->id","Edit") }}
						</td>
					</tr>
					@empty
					<tr>
						<td>There are no courses</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			{{ $courses->links() }}
			{{ HTML::link('admin/courses/create', 'Add Course',array('class'=>'btn pull-right')) }}
			<br><br>
		</div>
	</div>
</div>