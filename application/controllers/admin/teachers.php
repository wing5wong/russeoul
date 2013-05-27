<?php

class Admin_Teachers_Controller extends Base_Admin_Controller {

    function __construct(){
        parent::__construct();
    }

    public $restful = true;


    public function get_index()
    {
        $teachers =  Teacher::paginate(10);

        $this->layout->subtitle = "Admin/Teachers";
        $this->layout->content = View::make('admin.teachers')
        ->with('teachers',$teachers);

    }

    public function get_details($id)
    {
//find teacher by id
        $teacher = Teacher::find($id);

//get all courses - include teacher_id. useful for setting checked attribute on checkbox
//									$course->teacher_id == $teacher->id ? true : false
        $courses = Course::join('course_teacher','course_teacher.course_id','=','courses.id')
        ->get(array('courses.id', 'courses.name','course_teacher.teacher_id'));

//get courses related to $teacher
        $my_courses = $teacher->courses;

//get courses where $teacher is not already teaching
// SELECT * FROM courses where courses.id not in( select course_id from teachers join course_teacher on teachers.id = course_teacher.teacher_id where teacher_id=1)
//$available_courses = Course::left_join('course_teacher','course_teacher.course_id','=','courses.id')
//						->where_null('teacher_id')
//					->get(array('courses.id', 'courses.name'));
        $query_string = "SELECT courses.id,courses.name FROM courses where courses.id not in( select course_id from teachers join course_teacher on teachers.id = course_teacher.teacher_id where teacher_id=?)";
        $available_courses = DB::query($query_string,array($id));

        $this->layout->subtitle = "Admin/Teachers/Details";
        $this->layout->content = View::make('admin.teachers.view')
        ->with('teacher',$teacher)
        ->with('courses',$courses)
        ->with('available_courses',$available_courses)
        ->with('my_courses',$my_courses)
        ;
    }

    public function post_details($id)
    {
        $teacher = Teacher::find($id);
        if( Input::has('action') )
        {
            switch(Input::get('action'))
            {
                case 'save' :
                $teacher->fill( Input::only(array('firstname','lastname','phone','email')) );
                $teacher->save();
                return Redirect::to_action("admin.teachers@details/$id");  

                case 'delete' :
                $teacher->user()->delete();
                $teacher->delete();
                return Redirect::to_action("admin.teachers@index");

                case 'course_update' :
                $course_selected = Input::get('course_selected');
                if( $course_selected != ''){
                    $teacher->courses()->attach(Input::get('course_selected'));
                }
                return Redirect::to_action("admin.teachers@details/$id");
            }
        }
        return Redirect::to_action("admin.teachers@details/$id");
    }

    public function get_create()
    {
        $this->layout->subtitle = "Admin/Teachers/Create";
        $this->layout->content = View::make('admin.teachers.create');
    }

    public function post_create()
    {
        /**
        * TODO: data validation
        * unique
        *
        */

        //get the data
        $data = Input::all();

        $rules = array(
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,username',
            );

        $validation = Validator::make($data,$rules);

        if( $validation->fails() )
        {
            return Redirect::to_action('admin.teachers.create')
            ->with_errors($validation)
            ->with_input();
        }
        else{

            $firstname = Input::get('firstname');
            $lastname = Input::get('lastname');
            $password = Hash::make('password');
            $username = Input::get('email');

            //the teacher role
            $role = Role::where_name('teacher')->first();

            //create a new user
            $user = User::create(
                array(
                    'username' => "$username",
                    'password' => "$password",
                    'active' => '1'
                    )

                );

            //add the user to the role
            $user->roles()->attach($role->id);

            //create the teacher
            $teacher = Teacher::create(
                array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'phone' => Input::get('phone'),
                    'email' => Input::get('email'),
                    'user_id' => $user->id,
                    )
                );

            // attach all the courses to the new teacher
            $courses = Course::all();
            foreach($courses as $course)
            {
                $teacher->courses()->attach($course->id);
            }

            //now redirect to the new teachers profile
            return Redirect::to_action("admin.teachers@details/$teacher->id")
            ->with('create_success',true);

        }

    }


}