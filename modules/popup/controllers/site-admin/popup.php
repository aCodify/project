<?php

class popup extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
		$this->load->model('popup/popup_model');
	}
	 
	
	function index() 
	{



	}// index
	


}