<?php

class Admin_Controller extends Base_Admin_Controller {

	
	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth-admin');
	}

	public $restful = true;
	

	public function get_index()
	{
		
		$this->layout->subtitle = "Admin Index";
		$this->layout->content = View::make('admin.index');

	}
	
	public function get_courses()
	{
		return View::make('admin.courses');
	}
	
	public function get_results()
	{
		$this->layout->subtitle = "Admin / Results";
		$this->layout->content = View::make('admin.results');
	}
	

}