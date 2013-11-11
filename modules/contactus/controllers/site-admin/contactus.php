<?php

class contactus extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
		$this->load->model('contactus/contactus_model');
	}
	 
	
	function index() 
	{
		$output['this_title_page'] = 'Contact Us';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Contact Us' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Contact Us';
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		
		$output['show_data']['google_code'] = $this->content_config_model->get( 'contact_google_code' );
		$output['show_data']['address'] = $this->content_config_model->get( 'contact_address' );
		$output['show_data']['work_time'] = $this->content_config_model->get( 'contact_work_time' );
		$output['show_data']['travel'] = $this->content_config_model->get( 'contact_travel' );
		$output['show_data']['phone'] = $this->content_config_model->get( 'contact_phone' );

		$output['show_data']['slug'] = $this->content_config_model->get( 'contact_slug' );
		$output['show_data']['tag_keywords'] = $this->content_config_model->get( 'contact_tag_keywords' );
		$output['show_data']['tag_description'] = $this->content_config_model->get( 'contact_tag_description' );
		$output['show_data']['email'] = $this->content_config_model->get( 'contact_email' );		

		if ( $this->input->post() ) 
		{
			$data_input = $this->input->post();
			$this->contactus_model->add( $data_input );

			$this->session->set_flashdata( 'form_status', preview_success() );
			redirect( 'site-admin/contactus' );

		}



		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

}