
<div class="row">
    <div class="span12">
        {{ HTML::link_to_action('teacher@index','Teachers Index') }}
    </div>
</div>
<br />
{{Form::open(null,'post',array('class'=>'form-inline')) }}
<div class="row">
    <div class="span6">
        <div class="well">
            <h5>Attendance</h5>
            @if($lesson->students()->get() != null)
            <table class="table table-hover table-condensed">
                <tr>
                    <th>Student</th>
                    <th colspan="2">Present / Absent</th>
                </tr>
                @forelse($lesson->students()->get() as $student)
                <tr @if($student->pivot->present == 1) class="success" @else class="error" @endif>
                    <td>
                        {{ $student->firstname }} {{$student->lastname }}
                    </td>
                    <td class="centered">
                        <button type="submit" name="present" value="{{$student->id}}" @if($student->pivot->present == 1) class='btn btn-mini btn-success disabled' disabled='disabled' @else class="btn btn-mini btn-success" @endif><i class="icon-ok"></i></span></button>
                    </td>
                    <td class="center">
                        <button type="submit" name="absent" value="{{$student->id}}" @if(!$student->pivot->present == 1) class='btn btn-mini btn-danger disabled' disabled='disabled' @else class="btn btn-mini btn-danger" @endif><i class="icon-remove"></i></span></button>
                    </td>
                </tr>
                @empty
                no students participating in this lesson

                @endforelse
            </table>
            @endif
        </div>
    </div>
    <div class="span6">
        <div class="well">
            <h5>Lesson Resources</h5>
            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a href="#">some sample</a>
                </li>
                <li>
                    <a href="#">resources</a>
                </li>
                <li>
                    <a href="#">can be found</a>
                </li>
                <li>
                    <a href="#">here</a>
                </li>
            </ul>
        </div>
    </div>

</div>
</div>
{{ Form::close()}}