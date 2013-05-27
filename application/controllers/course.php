<?php

class Course_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth');
	}
    
	public function get_index()
	{
		return View::make('course.index');
	}

}