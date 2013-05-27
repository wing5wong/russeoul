<?php

class Admin_Students_Controller extends Base_Admin_Controller {

	function __construct(){
		parent::__construct();
	}

	public $restful = true;
	

	public function get_index()
	{
		$students =  Student::paginate(10);
        $courses = Course::all();

        $this->layout->subtitle = "Admin/Students";
        $this->layout->content = View::make('admin.students')
        ->with('students',$students)
        ->with('courses',$courses);

    }

    public function get_details($id)
    {
      $student = Student::find($id);

      $query_string = "SELECT courses.id,courses.name FROM courses where courses.id not in( select course_id from students join course_student on students.id = course_student.student_id where student_id=?)";
      $available_courses = DB::query($query_string,array($id));

      $this->layout->subtitle = "Admin/Students/Details";
      $this->layout->content = View::make('admin.students.view')
      ->with('student',$student)
      ->with('available_courses',$available_courses);
  }

  public function post_details($id)
  {
      $student = Student::find($id);

      if( Input::has('action') )
      {
        switch(Input::get('action'))
        {
            case 'save' :
            $student->fill( Input::only(array('firstname','lastname','koreanfirstname','koreanlastname','phone','email')) );
            $student->save();
            return Redirect::to_action("admin.students@details/$id");  

            case 'delete' :
            $student->user()->delete();
            $student->delete();
            return Redirect::to_action("admin.students@index");
        }
    }
    return Redirect::to_action("admin.students@details/$id");
}

public function get_create()
{
    $courses = Course::all();
    $this->layout->subtitle = "Admin/Students/Create";
    $this->layout->content = View::make('admin.students.create')
    ->with('courses',$courses);
}

/*	public function post_create(){
	
		$student = new Student;
		$student->fill( Input::get() );
		$student->save();
		
		return Redirect::to_action('admin.students@index');
	
	}
*/

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
            'firstname' => 'required|alpha|max:50',
            'lastname' => 'required|alpha|max:50',
            'koreanfirstname' => 'required|max:50',
            'koreanlastname' => 'required|max:50',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,username',
            'course' =>'required',
            );

        $validation = Validator::make($data,$rules);

        if( $validation->fails() )
        {
            //dd($validation->errors->messages['phone']);
            if (Request::ajax())
            {
                return Response::json($validation->errors);
            }
            return Redirect::to_action('admin.students.create')
            ->with_errors($validation)
            ->with_input();
        }
        else{

            $firstname = Input::get('firstname');
            $lastname = Input::get('lastname');
            $koreanfirstname = Input::get('firstname');
            $koreanlastname = Input::get('lastname');
            $password = Hash::make('password');
            $username = Input::get('email');

            
            
            //the student role
            $role = Role::where_name('Student')->first();

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

            //create the student
            $student = new Student(
                array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'koreanfirstname' => Input::get('firstname'),
                    'koreanlastname' => Input::get('lastname'),
                    'phone' => Input::get('phone'),
                    'email' => Input::get('email'),
                    )
                );

            $user->student()->insert($student);
            
            // attach the new student to selected course
            $course = Course::find(Input::get('course'));
            $student->courses()->attach($course->id);
            
            if (Request::ajax())
            {
                return Response::json(array('success'=>'1'));
            }

            //now redirect to the new students profile
            return Redirect::to_action("admin.students@details/$student->id")
            ->with('create_success',true);

        }

    }


}