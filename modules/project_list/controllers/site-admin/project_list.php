<?php

class project_list extends admin_controller 
{

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('project_list/project_list_model');
	}
	 

	public function index( )
	{

		$output['data_list'] = $this->project_list_model->get_list();		
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/admin_index' , $output );
	} 

	public function project_add()
	 {

	 	if ( $this->input->post() ) 
	 	{		

	 		$array_validation = array( 'project_name' =>'Name project' , 'user_name' => 'User name' , 'password' => 'Password');

	 		foreach ( $array_validation as $key => $value ) 
	 		{
	 			if ( ! $this->input->post( $key ) ) 
	 			{
	 				$error_validation[] = 'Please enter information '.$array_validation[ $key ];
	 			}
	 		}

	 		if ( ! empty( $error_validation )  ) 
	 		{
	 			$output[ 'error_validation' ] = preview_error( $error_validation );
	 		}
	 		else
	 		{
	 			$data_array = $this->input->post();
	 			$this->project_list_model->add( $data_array );
	 		}
	 	}


	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => site_url( 'site-admin/project_list' ) , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/form_view' , $output );
	} 

	public function project_list_edit( $id = '' )
	{
		$output['show_data'] = $this->project_list_model->get_date( $id );


	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Project List';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Project List' => site_url( 'site-admin/project_list' ) , 'Project List' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Project List';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/form_view' , $output );
	}


	public function project_list_delete( $id = '' )
	{
		$this->db->where( 'id', $id );
		$this->db->delete( 'project_list' );

		$this->db->where( 'project_id', $id );
		$this->db->delete( 'member_project' );
		echo "1";
	}




}