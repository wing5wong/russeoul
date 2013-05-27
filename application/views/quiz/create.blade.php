<div class="row">
	<div class="span12">
		<ul class="breadcrumb">
			<li>{{ HTML::link_to_action('quiz@index','Quiz') }} <span class="divider">/</span></li>
			<li class="active">Create</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="span12">
		<div class="well">
		<h5>New Quiz:</h5>
		{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

		<div class="control-group @if ($errors->has('name') ) error @endif">  
			{{ Form::label('name','Quiz Name',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::text('name',Input::old('name'),array('class'=>'input-xlarge'))}}
				@if($errors->has('name'))
				{{ $errors->first('name', "<span class='help-inline'>:message</span>") }} 
				@endif
			</div>
		</div>

		<div class="control-group @if ($errors->has('instructions') ) error @endif">  
			{{ Form::label('instructions','Instructions',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::textarea('instructions',Input::old('instructions'),array('class'=>'input-xlarge')) }}
				@if($errors->has('instructions'))
				{{ $errors->first('instructions', "<span class='help-inline'>:message</span>") }} 
				@endif
			</div> 
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success"><i class="icon-save"></i> Create</button>
            <button type="reset" class="btn"> <i class="icon-trash"></i> Clear Fields</button>
		</div>

		{{ Form::close() }}
	</div>
	</div>
</div>
