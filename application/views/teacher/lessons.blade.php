<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span12">
                {{ HTML::link_to_action('teacher@index','Teachers Index') }}
            </div>
        </div>
        <br />
        @forelse($courses as $course)
        <div class="row">
            <div class="span12">
                <div class="row">

                    <div class="span12">
                        <h5>{{ $course->name }}</h5>
                    </div>
                    <div class="span12">
                        <h6>Lessons</h6>
                        <ul>
                            @forelse($course->lessons()->get() as $lesson)
                            <li>
                                {{ HTML::link("teacher/lessons/details/$lesson->id",$lesson->date) }}
                            </li>

                            @empty

                            <li>There are no lessons created for this course</li>

                            @endforelse
                        </ul>
                    </div>
                </div>
                @empty

            </div>
            @endforelse

        </div>
    </div>
</div>