<div class="row">
	<div class="span12">
		<div class="well">
			<h5>New Answer:</h5>
			<p>your answer type: {{ Session::get('questiontype') }}</p>
			{{ Form::open(null,'post',array('class'=>'form-horizontal')) }}

			<div class="control-group @if ($errors->has('a1') ) error @endif">  
				{{ Form::label('a1','Answer 1: ',array('class'=>'control-label')) }}
				<div class="controls">
					{{ Form::text('a1',Input::old('a1'),array('class'=>'input-xlarge'))}}
					@if($errors->has('a1'))
					{{ $errors->first('a1', "<span class='help-inline'>:message</span>") }} 
					@endif
					@if(Session::get('questiontype') === Questiontype::SINGLECHOICE || Session::get('questiontype') === Questiontype::SHORTANSWER)
					<label class="radio">CorrectAnswer?<input type="radio" name="correctanswer" value="1" checked></label>
					@else
					<label class="checkbox">CorrectAnswer?<input type="checkbox" name="correctanswer[]" value="1" checked></label>
					@endif
				</div>
			</div>

			@if(Session::get('questiontype') === Questiontype::SINGLECHOICE)
			<button class="btn" id="add_sc_answer">Add another single choice answer</button>
			@elseif(Session::get('questiontype') === Questiontype::MULTIPLECHOICE)
			<button class="btn" id="add_mc_answer">Add another multiple choice answer</button>
			@endif
			

			{{Form::submit('submit',array('class'=>'btn btn-success'))}}
			{{ Form::close() }}
		</div>
	</div>
</div>

@section('scripts')
<script type="text/javascript">
$('#add_sc_answer').click(function(e) {
	e.preventDefault();

	var count = 1 + parseInt($('input[type="text"]').length);

	var lastinput = $('form .control-group').last();

	var cg = $('<div />',{
		"class": 'control-group'
	});

	var label = $('<label />',{
		"class": 'control-label'
	});
	label.html('Answer ' + count + ": ");

	var controls = $('<div />', {
		"class": "controls"
	});

	var rb_label = $('<label />', {
		"class" :"radio"
	});

	rb_label.html('CorrectAnswer?');
	var rb = $('<input />', {
		type: "radio",
		name: "correctanswer",
		value: count
	});

	var ip = $('<input />', {
		type: "text",
		name: "a" + count,
		"class" : 'input-xlarge'
	});

	cg.append(label)
	cg.append(controls);
	controls.append(ip);
	controls.append(rb_label);
	rb_label.append(rb);

	cg.insertAfter(lastinput);
});

$('#add_mc_answer').click(function(e) {
	e.preventDefault();
	
	var count = 1 + parseInt($('input[type="text"]').length);

	var lastinput = $('form .control-group').last();

	var cg = $('<div />',{
		"class": 'control-group'
	});

	var label = $('<label />',{
		"class": 'control-label'
	});
	label.html('Answer ' + count + ": ");

	var controls = $('<div />', {
		"class": "controls"
	});

	var cb_label = $('<label />', {
		"class" :"checkbox"
	});

	cb_label.html('CorrectAnswer?');
	var cb = $('<input />', {
		type: "checkbox",
		name: "correctanswer[]",
		value: count
	});

	var ip = $('<input />', {
		type: "text",
		name: "a" + count,
		"class" : 'input-xlarge'
	});

	cg.append(label)
	cg.append(controls);
	controls.append(ip);
	controls.append(cb_label);
	cb_label.append(cb);

	cg.insertAfter(lastinput);
});
</script>
@endsection
