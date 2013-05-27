
@if (Session::has('create_success'))
<div class="row">
	<div class="span12">
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>

			<p><strong>Great!</strong> New teacher created successfully!</p>	
		</div>	
	</div></div>
	@endif 
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }}<span class="divider">/</span></li>
			<li>{{ HTML::link_to_action('admin.teachers@index','Teachers') }}<span class="divider">/</span></li>
			<li class="active">View</li>
		</ul>
		</div>
	</div>
	<div class="row">

		<div class="span6">
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}
			<h5>Details:</h5>

			<div class="control-group">  
				{{ Form::label('firstname','First Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
						{{ Form::text('firstname',$teacher->firstname,array('class'=>'input-xlarge input-block-level'))}}
					</div>
				</div> 
			</div>

			<div class="control-group">  
				{{ Form::label('lastname','Last Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
						{{ Form::text('lastname',$teacher->lastname,array('class'=>'input-xlarge input-block-level')) }}	
					</div>
				</div> 
			</div>

			<div class="control-group">  
				{{ Form::label('email','Email Address',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span>
						{{ Form::text('email',$teacher->email,array('class'=>'input-xlarge input-block-level')) }}
					</div>
				</div> 
			</div>

			<div class="control-group">  
				{{ Form::label('phone','Phone Number',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-phone"></i></span>
						{{ Form::text('phone',$teacher->phone,array('class'=>'input-xlarge input-block-level')) }}
					</div>
				</div> 
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-danger" name="action" value="save" ><i class="icon-save"></i> Save</button>
				<button type="submit" class="btn" name="action" value="delete"><i class="icon-trash"></i> Delete</button>
			</div>
			{{ Form::close() }}
		</div>
		<div class="span6">
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}
			<h5>Courses</h5>
			<ul class="icons">
				@forelse($my_courses as $course)
				<li><i class="icon-book"></i>{{HTML::link_to_action("admin.courses@details/$course->id","$course->name") }}</li>
				@empty
				@endforelse
			</ul>

			<hr>

			<h6>Add Course</h6>
			<div class="control-group"> 
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-edit"></i></span>
						<select name="course_selected" class="input-block-level">
							<option value="">Select a course to add</option>
							@forelse($available_courses as $course)
							<option value="{{$course->id}}">{{$course->name}}</option>
							@empty
							@endforelse
						</select>
					</div>

				</div>

			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-danger" name="action" value="course_update"><i class="icon-plus"></i> Add Course</button>
			</div>
			{{ Form::close() }}
		</div>

	</div>
</div>