<?php

class Profile_Controller extends Base_Controller {

	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth');
	}
    
	public function action_index()
	{
		return View::make('profile.index');
	}

}