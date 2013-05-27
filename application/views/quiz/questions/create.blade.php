<div class="row">
	<div class="span6">
		<div class="well">
			<h5>New Question:</h5>
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}
			{{Form::hidden('quiz',$quiz->id)}}
			<div class="control-group @if ($errors->has('questiontext') ) error @endif">  
				{{ Form::label('questiontext','Question Text',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('questiontext',Input::old('questiontext'),array('class'=>'input-xlarge'))}}
					@if($errors->has('questiontext'))
					{{ $errors->first('questiontext', "<span class='help-inline'>:message</span>") }} 
					@endif
				</div>
			</div>

			<div class="control-group  @if ($errors->has('questiontype') ) error @endif"> 
				{{ Form::label('questiontype','Question Type',array('class'=>'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-edit"></i></span>
						<select name="questiontype" class="input-block-level">
							<option value="">Select type of question</option>
							@forelse($questiontypes as $questiontype)
							<option value="{{$questiontype->id}}">{{$questiontype->type}}</option>
							@empty
							@endforelse
						</select>
					</div>
					@if($errors->has('questiontype'))
					{{ $errors->first('questiontype', "<span class='help-inline'>:message</span>") }} 
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

	<div class="span6">
		<ul>
		@foreach(Session::get('quiz')->questions()->get() as $question)
			<li>{{$question->questiontext}}</li>
		@endforeach
	</ul>
	</div>

</div>
