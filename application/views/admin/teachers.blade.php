<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li class="active">Teachers</li>
		</ul>

	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th>
						First Name
					</th>
					<th>
						Last Name
					</th>
					<th>
						Phone
					</th>
					<th>
						Email
					</th>
					<th>
						Actions
					</th>
				</tr>
			</thead>
			<tbody>
				@forelse($teachers->results as $teacher)
				<tr>
					<td>
						{{ $teacher->firstname }}
					</td>
					<td>
						{{ $teacher->lastname }}
					</td>
					<td>
						{{ $teacher->phone }}
					</td>
					<td>
						{{ $teacher->email }}
					</td>
					<td>
						{{ HTML::link("admin/teachers/details/$teacher->id","Edit") }}
					</td>
				</tr>
				@empty
				<tr>
					<td>There are no teachers</td>
				</tr>
				@endforelse
			</tbody>
		</table>

		{{ $teachers->links() }}

		{{ HTML::link('admin/teachers/create', 'Add Teacher',array('class'=>'btn pull-right')) }}
		<br /><br>
	</div>
	</div>
</div>