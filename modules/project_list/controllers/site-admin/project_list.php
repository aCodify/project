<?php

class project_list extends admin_controller 
{

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('about/about_model');
	}
	 

	public function index( )
	{
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['data_list'] = $this->about_model->get_list();
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/admin_index' , $output );
	} 

	public function project_add()
	 {
	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['data_list'] = $this->about_model->get_list();
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => site_url( 'site-admin/project_list' ) , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/admin_index' , $output );
	 } 


}