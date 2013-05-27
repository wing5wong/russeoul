
<div class="row">
    <div class="span12">
       <ul class="breadcrumb">
            <li>{{ HTML::link_to_action('teacher@index','Teacher') }} <span class="divider">/</span></li>
            <li class="active">Student: {{ $student->firstname }} {{$student->lastname }}</li>
        </ul>
    </div>
</div>
<br />
{{Form::open(null,'post',array('class'=>'form-inline')) }}
<div class="row">
    <div class="span3">
        <h5>Details</h5>
            <p>{{$student->firstname}} {{$student->lastname}}</p>
            <p>{{$student->email}}</p>
            <p>{{$student->phone}}</p>
    </div>
    <div class="span3">
        <h5>Submissions</h5>
            <ul class="nav nav-tabs nav-stacked">
            @forelse($student->submissions()->get() as $submission)
            <li>{{HTML::link("/teacher/submission/view/$submission->id",$submission->name)}}</li>
            @empty
            <li><a href="#">No submissions</a></li>
            @endforelse
        </ul>
    </div>
    <div class="span3">
        <h5>Quiz Results</h5>
            <ul class="nav nav-tabs nav-stacked">
            <li><a href="#">Quiz 1</a></li>
            <li><a href="#">Quiz 2</a></li>
        </ul>
    </div>
    <div class="span3">
        <h5>Attendance</h5>
            <ul class="nav nav-tabs nav-stacked">
            <li><a href="#">Attendance lsit  1</a></li>
            <li><a href="#">Attendance lsit  1</a></li>
        </ul>
    </div>

</div>
</div>
{{ Form::close()}}