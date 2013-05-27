
<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li>{{ HTML::link_to_action('student@index','Student') }} <span class="divider">/</span></li>
            <li class="active">My submitted files</li>
        </ul>
    </div>
</div>


@forelse($submissions as $submission)
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="/student/submission/view/<?php echo $submission->id ?>">@if($submission->name != null) {{$submission->name}} @else untitled file @endif</a></li>
        </ul>
    </div>
    <div class="span9">
        <div class="well">
            @forelse ($submission->feedback as $sf)
            <blockquote>{{$sf->comment}} - <cite>{{$sf->teacher->firstname}}</cite></blockquote>

            @empty
            no feedback left for this submission
            @endforelse
        </div>
    </div>
</div>
@empty
no submissions
@endforelse
