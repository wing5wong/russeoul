<?php

class Base_Teacher_Controller extends Base_Controller {

	
	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth-teacher');

       
    }

}