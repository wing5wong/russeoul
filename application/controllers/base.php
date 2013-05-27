<?php

class Base_Controller extends Controller {

	public $layout = 'layouts.common';
	public $restful = true;

	/**
	* Catch-all method for requests that can't be matched.
	*
	* @param  string    $method
	* @param  array     $parameters
	* @return Response
	*/
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct()
	{
		parent::__construct();
		
		Asset::container('header')->add('bootstrap-css','css/bootstrap.css');
		Asset::container('header')->add('font-awesome-css','css/font-awesome.css');
		Asset::container('header')->add('css','css/style.css');
		Asset::container('header')->add('ginue','css/ginue.css');
		Asset::container('header')->add('responsive','css/bootstrap-responsive.css');


		Asset::container('footer')->add('jquery', 'js/jquery.js');
		Asset::container('footer')->add('bootstrap', 'js/bootstrap.min.js', 'jquery');

		$this->layout->title = "GINUE TESOL Courses";
		$this->layout->subtitle = ( Lang::line('home.welcome')->get() );

		$menuItems = array();

		if(Auth::check())
		{
			foreach(Auth::user()->roles as $role)
			{
				if( $role->name == 'Student')
				{
					$menuItems[] = array(
						'link'=>'student',
						'text'=> Lang::line('menu.student')->get(),
						);
				}
				if( $role->name == 'Teacher' )
				{
					$menuItems[] = array(
						'link'=>'teacher',
						'text'=> Lang::line('menu.teacher')->get(),
						);
				}
				if( $role->name == 'Admin' )
				{
					$menuItems[] = array(
						'link'=>'admin',
						'text'=> Lang::line('menu.admin')->get(),
						);
				}
			}
		}		
		$this->layout->menu = $menuItems;

		$this->layout->content = "";

	}
}