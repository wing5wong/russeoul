
		{{ HTML::link('/','Home') }} &nbsp;&nbsp;
		{{ HTML::link('quiz/create','Add Quiz') }}
		<h2>Quizzes List</h2>
		<table class="table table-bordered table-condensed table-hover">
			@forelse($quizzes as $quiz)
			<tr>
				<td>{{ $quiz->name }}</td>
			</tr>
			@empty
			<tr><td>no quizzes</td></tr>
			@endforelse
		</table>
