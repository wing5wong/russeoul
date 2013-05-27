<?php

class Resource_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth');
	}
    
	public function action_index()
	{
		return View::make('resource.index');
	}

}