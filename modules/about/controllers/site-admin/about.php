<?php

class about extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('about/about_model');
	}
	 
	
	function index( $info = '' ) 
	{

		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['data_list'] = $this->about_model->get_list();
		$output['this_title_page'] = 'About';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'About' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'About';

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index

	public function about_add()
	{

		if ( $this->input->post() ) 
		{
			//set data
			$error = array();
			$array_not_check = array( 'slug' , 'tag_keywords' , 'tag_description' );

			// check input empty
			foreach ( $this->input->post() as $key => $value ) 
			{
				if ( empty( $value ) AND ! in_array( $key , $array_not_check ) ) 
				{
					$error[] = 'Please enter information '.ucfirst( $key );
				}

				$output['show_data'][$key] = $value;

			}

			// return error
			$output['error'] = preview_error( $error );


			if ( empty( $output['error']  ) ) 
			{
				
				$this->about_model->add( $this->input->post() );

				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/about' );
			}

		} // end post

		// data year it use
		$output['data_year'] = $this->about_model->get_year();


		$output['this_title_page'] = 'About Add';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'About' => site_url('site-admin/about') , 'About Add' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'About';


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );
	}
	

	public function about_edit( $id = '' )
	{

	
		if ( $this->input->post() ) 
		{
			//set data
			$error = array();
			$array_not_check = array( 'slug' , 'tag_keywords' , 'tag_description' );

			// check input empty
			foreach ( $this->input->post() as $key => $value ) 
			{
				if ( empty( $value ) AND ! in_array( $key , $array_not_check ) ) 
				{
					$error[] = 'Please enter information '.ucfirst( $key );
				}
			}
			// return error
			$output['error'] = preview_error( $error );

			if ( empty( $output['error']  ) ) 
			{
				
				$this->about_model->edit( $id , $this->input->post() );

				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/about' );
			}

			$data = $this->input->post();
			foreach ( $data as $key => $value ) 
			{
				$output['show_data'][$key] = $value;
			}				

		} // end post
		else
		{

			$data = $this->about_model->get_data( $id );
			foreach ( $data as $key => $value ) 
			{
				$output['show_data'][$key] = $value;
			}

		}
		// data year it use
		$output['data_year'] = $this->about_model->get_year();
		foreach ( $output['data_year'] as $key => $value) 
		{
			if ( $value == $output['show_data']['year'] ) 
			{
				unset( $output['data_year'][$key] );
			}
		}

		$output['this_title_page'] = 'About Edit';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'About' => site_url('site-admin/about') , 'About Edit' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'About';

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );
	}	


	public function about_delete( $id = '' )
	{
		$this->about_model->delete( $id );
		echo "1";
	}


}

