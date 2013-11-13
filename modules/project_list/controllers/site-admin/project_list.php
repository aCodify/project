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

	 	if ( $this->input->post() ) 
	 	{	
	 		
	 		$this->db->set( 'project_name', $this->input->post( 'project_name' ) );
	 		$this->db->set( 'link_file', $this->input->post( 'link_file' ) );
	 		$this->db->set( 'status', 1 );
	 		$this->db->set( 'start_date', strtotime( date( 'Y/m/d' ) ) );
	 		$this->db->set( 'end_date', strtotime( date( 'Y/m/d' ) ) );
	 		$this->db->insert( 'project_list' );

	 		$last_id = $this->db->insert_id();

	 		$this->db->set( 'user_name', $this->input->post( 'user_name' ) );
	 		$this->db->set( 'password', md5( $this->input->post( 'password' ) ) );
	 		$this->db->set( 'project_id', $last_id );
	 		$this->db->set( 'status', 1 );
	 		$this->db->insert( 'member_project' );


	 	}





	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['data_list'] = $this->about_model->get_list();
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => site_url( 'site-admin/project_list' ) , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/form_view' , $output );
	 } 


}