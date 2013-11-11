<?php

class setting extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
	}
	 
	
	function index() 
	{
		$output['this_title_page'] = 'Setting';
		$breadcrumb = array( 'Home' => site_url('site-admin') , "Setting" => '#');
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Setting';
		$output['form_status'] = $this->session->flashdata( 'form_status' );

		$output['show_data']['header_background'] = $this->content_config_model->get( 'setting_public_header_image' );
		$output['show_data']['body_background'] = $this->content_config_model->get( 'setting_public_body_backgroud' );
		$output['show_data']['slug'] = $this->content_config_model->get( 'setting_slug' );
		$output['show_data']['tag_keywords'] = $this->content_config_model->get( 'setting_tag_keywords' );
		$output['show_data']['tag_description'] = $this->content_config_model->get( 'setting_tag_description' );
		$output['show_data']['code_analytics'] = $this->content_config_model->get( 'setting_google_analytics_code' );
		$output['show_data']['user_analytics'] = $this->content_config_model->get( 'setting_user_analytics' );
		$output['show_data']['password_analytics'] = $this->content_config_model->get( 'setting_password_analytics' );
		$output['show_data']['id_code_analytics'] = $this->content_config_model->get( 'setting_id_code_analytics' );

		if ( $this->input->post() ) 
		{
			
			$this->content_config_model->add( 'setting_public_header_image' , $this->input->post('header_background') );
			$this->content_config_model->add( 'setting_public_body_backgroud' , $this->input->post('body_background') );
			$this->content_config_model->add( 'setting_slug' , $this->input->post('slug') );
			$this->content_config_model->add( 'setting_tag_keywords' , $this->input->post('tag_keywords') );
			$this->content_config_model->add( 'setting_tag_description' , $this->input->post('tag_description') );
			$this->content_config_model->add( 'setting_google_analytics_code' , $this->input->post('code_analytics') );

			$this->content_config_model->add( 'setting_user_analytics' , $this->input->post('user_analytics') );
			$this->content_config_model->add( 'setting_password_analytics' , $this->input->post('password_analytics') );
			$this->content_config_model->add( 'setting_id_code_analytics' , $this->input->post('id_code_analytics') );

			$this->session->set_flashdata( 'form_status', preview_success() );
			redirect( 'site-admin/setting' );

		}


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

}