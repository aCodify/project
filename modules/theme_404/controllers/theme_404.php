<?php

class theme_404 extends MY_Controller {

	function __construct() 
	{
		parent::__construct();
	}
	
	
	function index() 
	{
		$this->load->view('theme_404/index');	

	}// index;
	

	

}
