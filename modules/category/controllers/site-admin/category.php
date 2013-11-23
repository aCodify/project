<?php

class category extends admin_controller 
{

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('category/category_model');
	}
	 

	public function index( )
	{
		$output['data_list'] = $this->category_model->get_list();		
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Category';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Category' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Category';
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/admin_index' , $output );
	} 

	public function category_add()
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
	 			$this->category_model->add( $data_array );
	 			
	 			$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/category' );
	 		}



	 	}


	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Category';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Category' => site_url( 'site-admin/category' ) , 'Category Add ' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Category';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/form_view' , $output );
	} 

	public function category_edit( $id = '' )
	{
		$output['show_data'] = $this->category_model->get_date( $id );


	 	$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Category';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Category' => site_url( 'site-admin/category' ) , 'Category edit' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Category';	

		$output['data_list'] = array();
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );	
		$this->generate_page( 'site-admin/form_view' , $output );
	}


	public function category_delete( $id = '' )
	{
		echo "1";
	}




}