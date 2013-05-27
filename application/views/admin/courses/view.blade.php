
<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li>{{ HTML::link_to_action('admin.courses@index','Courses') }} <span class="divider">/</span></li>
			<li class="active">View</li>
		</ul>
	</div>
</div>
<br />
<div class="row">
	<div class="span6">
		
		<div class="well">
			<h5>Details:</h5>
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

			<div class="control-group">  
				{{ Form::label('name','Course Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-edit"></i></span>
						{{ Form::text('name',$course->name,array('class'=>'input-xlarge input-block-level'))}}
					</div>
				</div> 
			</div>

			<div class="control-group">  
				{{ Form::label('description','Description',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-edit"></i></span>
						{{ Form::text('description',$course->description,array('class'=>'input-xlarge input-block-level')) }}
					</div>
				</div> 
			</div>

			<div class="controls">
				<button type="submit" name="save" value="save" class="btn btn-danger"><i class="icon-save"></i></span> Save</button>
				<button type="submit" name="delete" value="delete" class="btn"><i class="icon-trash"></i></span> Delete</button>
			</div>

			{{ Form::close() }}
		</div>
	</div>
	<div class="span3">
		
		<div class="well">
			<h5><i class="icon-group"></i> Teachers</h5>
			<ul class="icons">
				@forelse($course->teachers as $teacher)
				<li><i class="icon-user"></i>{{ HTML::link_to_action("admin.teachers/details/$teacher->id","$teacher->firstname $teacher->lastname") }}</li>
				@empty
				<li>---</li>
				@endforelse
			</ul>
		</div>
	</div>
	<div class="span3">
		
		<div class="well">
			<h5><i class="icon-group"></i> Students</h5>
			<ul class="icons">
				@forelse($course->students as $student)
				<li><i class="icon-user"></i>{{ HTML::link_to_action("admin.students/details/$student->id","$student->firstname $student->lastname") }}</li>
				@empty
				<li>---</li>
				@endforelse
			</ul>
		</div>
	</div>
</div>