<h2>Quiz Title</h2>
	{{ Form::open('quiz/mark','POST') }}
		{{ Form::label('Q1','Is this a sample question?') }}
		{{ Form::text('Q1') }}
		<br /><br />
		{{ Form::label('Q2','Is this a sample question?') }}
		{{ Form::text('Q2') }}
		<br /><br />
		{{ Form::label('Q3','Is this a sample question?') }}
		{{ Form::text('Q3') }}
		<br /><br />
		{{ Form::label('Q4','Is this a sample question?') }}
		{{ Form::text('Q4') }}
		<br /><br />
		{{ Form::label('Q5','Is this a sample question?') }}
		{{ Form::text('Q5') }}
		<br /><br />
		{{ Form::label('CBd','Tick relevant answers') }}
		<br />
		{{ Form::label('CB1','opt1') }}
		{{ Form::checkbox('CB1', 'value') }}
		<br />
		{{ Form::label('CB1','opt2') }}
		{{Form::checkbox('CB1', 'value') }}
		<br /><br />
		{{ Form::label('CBd','Select relevant option') }}
		<br />
		{{ Form::label('rad1','opt1') }}
		{{ Form::radio('rad1', 'value','false',array('name'=>'radigroup')) }}
		<br />
		{{ Form::label('rad2','opt2') }}
		{{Form::radio('rad2', 'value','false',array('name'=>'radigroup')) }}
		<br /><br />
		{{ Form::textarea('textarea') }}
		<br /><br />
		<br /><br />
		{{ Form::submit('Submit for Marking') }}
		{{ Form::reset('Reset all Answers') }}
	
	{{ Form::close() }}