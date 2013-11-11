<?php

class background extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
	}
	 
	
	function index() 
	{

		$output['this_title_page'] = 'Background';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Background' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Background';
		$output['form_status'] = $this->session->flashdata( 'form_status' );

		$output['show_data']['header_background'] = $this->content_config_model->get( 'background_header_backgroud' );
		$output['show_data']['body_background'] = $this->content_config_model->get( 'backgroung_body_backgroud' );

		if ( $this->input->post() ) 
		{
			
			$this->content_config_model->add( 'background_header_backgroud' , $this->input->post('header_background') );
			$this->content_config_model->add( 'backgroung_body_backgroud' , $this->input->post('body_background') );
			$this->session->set_flashdata( 'form_status', preview_success() );
			redirect( 'site-admin/background' );


		}

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index


	

}