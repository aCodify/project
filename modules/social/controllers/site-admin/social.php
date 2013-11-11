<?php

class social extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
		$this->load->model('social/social_model');
	}
	 
	
	function index() 
	{
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Social';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Social' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Social';

		$output['data_list'] = $this->social_model->get_list();


		if ( $this->input->post() ) 
		{

			$title_content = $this->input->post( 'title_detail' );
			$this->content_config_model->add( 'social_title' , $title_content );

			$slug = $this->input->post( 'slug' );
			$this->content_config_model->add( 'social_slug' , $slug );

			$tag_keywords = $this->input->post( 'tag_keywords' );
			$this->content_config_model->add( 'social_tag_keywords' , $tag_keywords );

			$tag_description = $this->input->post( 'tag_description' );
			$this->content_config_model->add( 'social_tag_description' , $tag_description );

			$this->session->set_flashdata( 'form_status', preview_success() );
			redirect( 'site-admin/social' );
		}


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

	public function social_add()
	{

		$output['this_title_page'] = 'Social Add';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Social' => site_url('site-admin/social') , 'Social Add' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Social';

		$error = array();


		if ( $this->input->post() ) 
		{
			
			$data_input = $this->input->post();

			// check and return validate data

			$validate_data = array( 'title' );
			foreach ( $data_input as $key => $value ) 
			{
				$output['show_data'][$key] = $value;
				if ( in_array( $key , $validate_data ) ) 
				{
					if ( empty( $value ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( $key ) );
					}
				}
			}

			if ( empty( $data_input['image'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image' ) );
			}

			$output['error'] = preview_error( $error );
			// end check and return validate data
			if ( empty( $output['error']  ) ) 
			{
		
				$this->social_model->add( $data_input );
				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/social' );

			}
		}

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );

	}
	

	public function social_edit( $id = '' )
	{

		$output['this_title_page'] = 'Social Edit';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Social' => site_url('site-admin/social') , 'Social Edit' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Social';

		$output['show_data'] = $this->social_model->get_data( $id );

		$error = array();

		if ( $this->input->post() ) 
		{
			$data_input = $this->input->post();

			// check and return validate data

			$validate_data = array( 'title' );
			foreach ( $data_input as $key => $value ) 
			{
				$output['show_data'][$key] = $value;
				if ( in_array( $key , $validate_data ) ) 
				{
					if ( empty( $value ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( $key ) );
					}
				}
			}

			if ( empty( $data_input['image'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image' ) );
			}

			$output['error'] = preview_error( $error );
			// end check and return validate data
			if ( empty( $output['error']  ) ) 
			{
		
				$this->social_model->edit( $id , $data_input );
				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/social' );

			}
		}


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );
		
	}	


	public function social_delete( $id = '' )
	{
		$this->social_model->delete( $id );
		echo "1";
	}	


	public function mark_sort()
	{
		if ( $this->input->post() ) 
		{
			$array_id = $this->input->post('id');
			foreach ( $array_id as $key => $value ) 
			{
				$this->db->where( 'id', $value );
				$this->db->set( 'order_sort', $key );
				$this->db->update( 'social' );

			}

			$this->session->set_flashdata( 'form_status', preview_success() );
		}
		redirect( 'site-admin/social' );
	}

}