@if (Session::has('login_type'))
<div class="row">
    <div class="span12">
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>

            <p><strong>Woops!</strong> You appear to be a {{ Session::get('login_type') }}, so we brought you here!</p>	
            <p>Don't want to be here? {{ HTML::link_to_action('login@index','Login as a different user') }} or {{ HTML::link_to_action('login@logout','Logout') }}</p>	
        </div>
    </div>
</div>
@endif 
<div class="row">
	<div class="span3">
        <div class="well">
        <img src="<?php echo 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( "$teacher->email" ) ) ) . '?s=100&amp;r=pg'?>"  class="img-polaroid" />
        <h5>Name: <small>{{ $teacher->firstname }} {{ $teacher->lastname }}</small></h5>
        <h5>Phone: <small>{{ $teacher->phone }}</small></h5>
        <h5>Email: <small>{{ $teacher->email }}</small></h5>
    </div>
    </div>
    <div class="span9">
        <div class="well">
        <h5>Student Feedback</h5>
        <ul class="nav nav-tabs nav-stacked">
            <li>{{HTML::link('teacher/feedback','List of student feedback')}}</li>
        </ul>
        <h5>Classes:</h5>
        
        <ul class="nav nav-tabs nav-stacked">
            @forelse($courses as $course)
            <li>{{HTML::link("teacher/courses/$course->id","$course->name")}}</li>
            @empty
            <li><small>---</small></li>
            @endforelse
        </ul>
    </div>
</div>
</div>