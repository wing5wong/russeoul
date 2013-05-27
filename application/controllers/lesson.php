<?php

class Lesson_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth');
	}
    
	public $restful = true;
	

	public function get_index()
	{
		
		$this->layout->subtitle = "Lesson Index";
		$this->layout->content = View::make('lesson.index');

	}
}