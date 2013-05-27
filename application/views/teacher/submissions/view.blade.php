<div class="row">
	<div class="span12">
		
		{{ Form::open('teacher/feedback/comment','post',array('class'=>'form-horizontal')) }}
		{{Form::hidden('submissionID',$submission->id)}}
		
		<div class="control-group">  
			{{ Form::label('submission_student','Student',array('class'=>'control-label')) }}
			<div class="controls">
				{{HTML::link("teacher/students/details/" . $submission->student->id, $submission->student->firstname . " " . $submission->student->lastname) }}
			</div>
		</div>

		<div class="control-group">  
			{{ Form::label('submission_download','Submission Download',array('class'=>'control-label')) }}
			<div class="controls">
				{{HTML::link("teacher/submission/download/$submission->id",$submission->name) }}
			</div>
		</div>

		<div class="control-group @if ($errors->has('comment') ) error @endif">  
			{{ Form::label('comment','Comment',array('class'=>'control-label')) }}
			<div class="controls">
				{{ Form::textarea('comment',Input::old('comment'),array('class'=>'input-xlarge')) }}
				@if($errors->has('comment'))
				{{ $errors->first('comment', "<span class='help-inline'>:message</span>") }} 
				@endif
			</div> 
		</div>

		<div class="form-actions">
			<button type="submit" class="btn btn-danger"><i class="icon-save"></i> Add comment</button>
			<button type="reset" class="btn"> <i class="icon-trash"></i> Clear Fields</button>
		</div>
		{{Form::close()}}
	</div>
</div>