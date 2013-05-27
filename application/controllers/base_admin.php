<?php

class Base_Admin_Controller extends Base_Controller {

	
	function __construct(){
		parent::__construct();
        
        $this->filter('before', 'auth-admin');

	}

}