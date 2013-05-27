<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li class="active">Students</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
			<table class="table table-striped table-condensed table-bordered">
				<thead>
					<tr>
						<th>
							First Name
						</th>
						<th>
							Last Name
						</th>
						<th>
							Korean First Name
						</th>
						<th>
							Korean Last Name
						</th>
						<th>
							Phone
						</th>
						<th>
							Email
						</th>
						<th>
							Classes
						</th>
						<th>
							Actions
						</th>
					</tr>
				</thead>
				<tbody>
					@forelse($students->results as $student)
					<tr>
						<td>
							{{ $student->firstname }}
						</td>
						<td>
							{{ $student->lastname }}
						</td>
						<td>
							{{ $student->koreanfirstname }}
						</td>
						<td>
							{{ $student->koreanlastname }}
						</td>
						<td>
							{{ $student->phone }}
						</td>
						<td>
							{{ $student->email }}
						</td>
						<td>
							<ul class="unstyled">
								@forelse( $student->courses()->get() as $course)
								<li>{{$course->name}}</li>
								@empty
								<li>N/A</li>
								@endforelse
							</ul>
						</td>
						<td>
							{{ HTML::link("admin/students/details/$student->id","Edit") }}
						</td>
					</tr>
					@empty
					<tr>
						<td>There are no students</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			{{ $students->links() }}
			<div class="btn-group pull-right">
				<button type="button" class="btn btn" onclick="$('#new_student_modal').modal({backdrop: 'static'});"><i class="icon-plus-sign icon-white"></i> Create new student</button>
			</div>
			<br />
		</div>
	</div>
</div>

<div class="modal hide" id="new_student_modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3>Create a new student</h3>
	</div>
	<div class="modal-body">
		<form method="POST" action="{{ URL::to('admin/students/create') }}" id="new_student_form" class="form-horizontal">
			<div class="control-group @if ($errors->has('firstname') ) error @endif">  
				{{ Form::label('firstname','First Name',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('firstname',Input::old('firstname'),array('class'=>'input-xlarge'))}}
					@if($errors->has('firstname'))
					{{ $errors->first('firstname', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div>
			</div>

			<div class="control-group @if ($errors->has('lastname') ) error @endif">  
				{{ Form::label('lastname','Last Name',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('lastname',Input::old('lastname'),array('class'=>'input-xlarge')) }}
					@if($errors->has('lastname'))
					{{ $errors->first('lastname', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div> 
			</div>

			<div class="control-group @if ($errors->has('koreanfirstname') ) error @endif">  
				{{ Form::label('koreanfirstname','Korean First Name',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('koreanfirstname',Input::old('koreanfirstname'),array('class'=>'input-xlarge'))}}
					@if($errors->has('koreanfirstname'))
					{{ $errors->first('koreanfirstname', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div>
			</div>

			<div class="control-group @if ($errors->has('koreanlastname') ) error @endif">  
				{{ Form::label('koreanlastname','Korean Last Name',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('koreanlastname',Input::old('koreanlastname'),array('class'=>'input-xlarge')) }}
					@if($errors->has('koreanlastname'))
					{{ $errors->first('koreanlastname', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div> 
			</div>

			<div class="control-group @if ($errors->has('email') ) error @endif">  
				{{ Form::label('email','Email',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('email',Input::old('email'),array('class'=>'input-xlarge'))}}
					@if($errors->has('email'))
					{{ $errors->first('email', "<span class='help-inline'>:message</span>") }} 
					@endif

				</div> 
			</div>

			<div class="control-group @if ($errors->has('phone') ) error @endif">  
				{{ Form::label('phone','Phone',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('phone',Input::old('phone'),array('class'=>'input-xlarge')) }}
					@if($errors->has('phone'))
					{{ $errors->first('phone', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div> 
			</div>

			<div class="control-group  @if ($errors->has('course') ) error @endif"> 
				{{ Form::label('course','Course',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-edit"></i></span>
						<select name="course" class="input-block-level">
							<option value="">Select a course to add</option>
							@forelse($courses as $course)
							<option value="{{$course->id}}" @if(Input::old('course')==$course->id) selected @endif>{{$course->name}}</option>
							@empty
							@endforelse
						</select>

					</div>
					@if($errors->has('course'))
					{{ $errors->first('course', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
		<button class="btn btn-success" id="new_student_create_button">Create</a>
		</div>
	</div>
</div>

@section('scripts')
<script type="text/javascript">
$('#new_student_create_button').click(function() {
	
	$('.help-inline').html("");
	$('.control-group').removeClass('error');

	var student ={}
	var fields = $('form input, form select');
	$.each(fields, function(){
		student[this.name] = this.value;
	});

	$.ajax({
		type: "POST",
		dataType: "json",
		url: BASE + "/admin/students/create",
		data: student,

		success: function(data) {
			if(data.success){
				//hide the modal
				$('#new_student_modal').modal('hide');

				//display an alert
				var alert = $('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Great! new student created. Continue adding students, or refresh the page to update the table</p></div>');
				var row = $('table').parent();
				alert.prependTo(row);
			}
			else{
				$.each( data.messages, function(key,value){
					var selector = "[name="+key+"]";
					var controls = $(selector).closest('.controls');
					controls.closest('.control-group').addClass('error');
					var help = controls.children('.help-inline');
					help.length == 0 ? help = $('<span class="help-inline"></span>') : help;
					help.appendTo(controls);
					help.html(value);
				});
			}
		}
	});
	return false;
});
</script>
@endsection