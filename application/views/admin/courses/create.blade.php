<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('admin@index','Admin') }} <span class="divider">/</span></li>
			<li>{{ HTML::link_to_action('admin.courses@index','Courses') }} <span class="divider">/</span></li>
			<li class="active">Add</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span12">
		<div class="well">
			<h5>New Course Details:</h5>

			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

			<div class="control-group">  
				{{ Form::label('name','Course Name',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('name',"",array('class'=>'input-xlarge input-block-level'))}}
				</div> 
			</div>

			<div class="control-group">  
				{{ Form::label('description','Description',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('description',"",array('class'=>'input-xlarge input-block-level')) }}	
				</div> 
			</div>

			<div class="form-actions">
				{{ Form::submit('Create',array('class'=>'btn btn-danger') ) }}
				{{ Form::reset('Clear Fields',array('class'=>'btn') ) }}
			</div>

			{{ Form::close() }}
		</div>
	</div>

</div>