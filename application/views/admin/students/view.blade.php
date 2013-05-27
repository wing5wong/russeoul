<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li >{{ HTML::link_to_action('admin.students@index','Students') }} <span class="divider">/</span></li>
			<li class="active">View</li>
		</ul>
	</div>
</div>
<div class="row">
	
	<div class="span6" >
		<div class="well">
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}
			<legend>Details:</legend>
			<div class="control-group ">  
				{{ Form::label('firstname','First Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on"><i class="icon-user"></i></span>
						{{ Form::text('firstname',$student->firstname,array('class'=>'input-xlarge input-block-level'))}}
						<span class="add-on"><abbr class="icon-exclamation-sign" title="Required Field"></abbr></span>
					</div>
				</div> 
			</div>

			<div class="control-group ">  
				{{ Form::label('lastname','Last Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on"><i class="icon-user"></i></span>
						{{ Form::text('lastname',$student->lastname,array('class'=>'input-xlarge input-block-level')) }}	
						<span class="add-on"><abbr class="icon-exclamation-sign" title="Required Field"></abbr></span>
					</div>
				</div> 
			</div>

			<div class="control-group ">  
				{{ Form::label('koreanfirstname','Korean First Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-globe"></i></span>
						{{ Form::text('koreanfirstname',$student->koreanfirstname,array('class'=>'input-xlarge input-block-level'))}}
					</div>
				</div> 
			</div>

			<div class="control-group ">  
				{{ Form::label('koreanlastname','Korean Last Name',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-globe"></i></span>
						{{ Form::text('koreanlastname',$student->koreanlastname,array('class'=>'input-xlarge input-block-level')) }}	
					</div>
				</div> 
			</div>

			<div class="control-group ">  
				{{ Form::label('email','Email Address',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span>
						{{ Form::text('email',$student->email,array('class'=>'input-xlarge input-block-level')) }}
					</div>
				</div> 
			</div>

			<div class="control-group ">  
				{{ Form::label('phone','Phone Number',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-phone"></i></span>
						{{ Form::text('phone',$student->phone,array('class'=>'input-xlarge input-block-level')) }}
					</div>
				</div> 
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-danger" name="action" value="save" ><i class="icon-save"></i> Save</button>
				<button type="submit" class="btn" name="action" value="delete"><i class="icon-trash"></i> Delete</button>
			</div>

			{{ Form::close() }}
		</div>

	</div>
	<div class="span6">
		<div class="well">
			<h5>Courses:</h5>
			<ul class="icons">
				@forelse($student->courses as $course)
				<li><i class="icon-book"></i>{{ HTML::link_to_action("admin.courses/details/$course->id",$course->name) }}</li>
				@empty
				<li>Student is not enrolled in any coursese</li>
				@endforelse
			</ul>
		</div>
	</div>
</div>