<?php

class Base_Student_Controller extends Base_Controller {

	
	function __construct(){
		parent::__construct();

        $this->filter('before', 'auth-student');

        
    }

}