<?php

class Login_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();

        $this->filter('before','csrf')->on('post');
	}

	public $restful = true;
	
    
    public function get_logout()
    {
        Auth::logout();
        return Redirect::to('home');
    }
    
	public function get_index()
	{
		$this->layout->subtitle = "Please Login";
		$this->layout->content = View::make('login.index');

	}
    
    public function post_index()
	{

        // get POST data
        $username = Input::get('username');
        $password = Input::get('password');
        $remember = Input::get('remember');
        
        $credentials = array(
            'username' => $username,
            'password' => $password,
            'remember' => $remember,
            );
        
        if ( Auth::attempt($credentials) ){
			
            $isStudent = false;
            $isTeacher = false;
            $isAdmin = false;
            foreach(Auth::user()->roles as $role)
            {
                if( $role->name == 'Student')
                {
                    $isStudent = true;
                }
                elseif( $role->name == 'Teacher' )
                {
                    $isTeacher = true;
                }
                elseif( $role->name == 'Admin' )
                {
                    $isAdmin = true;
                }
            }
            if( $isAdmin )
            {
                return Redirect::to_action('admin@index'); 
			}
            elseif( $isTeacher )
            {
                return Redirect::to_action('teacher@index'); 
			}
            if( $isStudent )
            {
                return Redirect::to_action('student@index'); 
			}
            
		}
        else
        {
            // auth failure! lets go back to the login
            return Redirect::to_action('login')
                ->with('login_errors', true);
        }
	}
    
}