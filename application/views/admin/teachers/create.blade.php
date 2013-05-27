<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li>{{ HTML::link_to_action('admin.teachers@index','Teachers') }} <span class="divider">/</span></li>
			<li class="active">Add</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<h5>New Teacher Details:</h5>
		{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

		<div class="control-group @if ($errors->has('firstname') ) error @endif">  
			{{ Form::label('firstname','First Name',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::text('firstname',Input::old('firstname'),array('class'=>'input-xlarge'))}}
				@if($errors->has('firstname'))<span class="help-inline">Please correct the error</span>@endif
			</div>
		</div>

		<div class="control-group @if ($errors->has('lastname') ) error @endif">  
			{{ Form::label('lastname','Last Name',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::text('lastname',Input::old('lastname'),array('class'=>'input-xlarge')) }}
				@if($errors->has('lastname'))<span class="help-inline">Please correct the error</span>@endif	
			</div> 
		</div>

		<div class="control-group @if ($errors->has('email') ) error @endif">  
			{{ Form::label('email','Email',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::text('email',Input::old('email'),array('class'=>'input-xlarge'))}}
				@if($errors->has('email'))<span class="help-inline">Please correct the error</span>@endif
			</div> 
		</div>

		<div class="control-group @if ($errors->has('phone') ) error @endif">  
			{{ Form::label('phone','Phone',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::text('phone',Input::old('phone'),array('class'=>'input-xlarge')) }}	
				@if($errors->has('phone'))<span class="help-inline">Please correct the error</span>@endif
			</div> 
		</div>

		<div class="form-actions">
			<button type="submit" class="btn btn-danger"><i class="icon-save"></i> Create</button>
			<button type="reset" class="btn"> <i class="icon-trash"></i> Clear Fields</button>
		</div>


		{{ Form::close() }}
	</div>
</div>