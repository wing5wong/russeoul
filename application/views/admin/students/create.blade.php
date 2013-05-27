<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li >{{ HTML::link_to_action('admin.students@index','Students') }} <span class="divider">/</span></li>
			<li class="active">Add</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
		<h5>New Student Details:</h5>
		{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

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
		<div class="form-actions">
			<button type="submit" class="btn btn-danger"><i class="icon-save"></i> Create</button>
            <button type="reset" class="btn"> <i class="icon-trash"></i> Clear Fields</button>
		</div>

		{{ Form::close() }}
	</div>
	</div>
</div>