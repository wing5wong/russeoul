<?php

class Teacher_Lessons_Controller extends Base_Teacher_Controller {

    public function get_index()
    {
        return View::make('teacher.lessons.index');
    }


    public function get_details($id)
    {
        $lesson = Lesson::find($id);

        if($lesson == null)
        {
            //lesson not found
            return Response::error('404');
        }

        $this->layout->subtitle = "Lesson $lesson->id - $lesson->date";
        $this->layout->content = View::make('teacher.lessons.details')
        ->with('lesson',$lesson);


    }

    public function post_details($id)
    {

        $lesson = Lesson::find($id);

        if($lesson == null)
        {
            //lesson not found
            return Response::error('404');
        }

        $this->layout->subtitle = "Lesson $lesson->id - $lesson->date";
        $this->layout->content = View::make('teacher.lessons.details')
        ->with('lesson',$lesson);



        if( Input::has('present') )
        {
            $student = Student::find( Input::get( 'present' ) );

            foreach ($student->lessons()->where_lesson_id($id)->get() as $lesson)
            {
                $lesson->pivot->present = '1';
                $lesson->pivot->save();
            }
            
        }
        elseif(Input::has('absent') )
        {

            $student = Student::find( Input::get( 'absent' ) );
            foreach ($student->lessons()->where_lesson_id($id)->get() as $lesson)
            {
                $lesson->pivot->present = '0';
                $lesson->pivot->save();
            }
        }


    }
}