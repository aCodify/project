<?php

class career extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('content_config_model');
		$this->load->model('career/career_model');
	}
	 
	
	function index() 
	{
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'Career';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Career' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Career';

		$output['show_data']['title_detail'] = $this->content_config_model->get( 'career_title' );

		$output['show_data']['slug'] = $this->content_config_model->get( 'career_slug' );
		$output['show_data']['tag_keywords'] = $this->content_config_model->get( 'career_tag_keywords' );
		$output['show_data']['tag_description'] = $this->content_config_model->get( 'career_tag_description' );

		$output['data_list'] = $this->career_model->get_list();


		if ( $this->input->post() ) 
		{

			$title_content = $this->input->post( 'title_detail' );
			$this->content_config_model->add( 'career_title' , $title_content );

			$slug = $this->input->post( 'slug' );
			$this->content_config_model->add( 'career_slug' , $slug );

			$tag_keywords = $this->input->post( 'tag_keywords' );
			$this->content_config_model->add( 'career_tag_keywords' , $tag_keywords );

			$tag_description = $this->input->post( 'tag_description' );
			$this->content_config_model->add( 'career_tag_description' , $tag_description );

			$this->session->set_flashdata( 'form_status', preview_success() );
			redirect( 'site-admin/career' );
		}


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

	public function career_add()
	{

		$output['this_title_page'] = 'Career Add';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Career' => site_url('site-admin/career') , 'Career Add' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Career';

		$error = array();

		if ( $this->input->post() ) 
		{
			$data_input = $this->input->post();

			// check and return validate data
			$validate_data = array( 'title' , 'image_cover' );
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

			if ( empty( $data_input['image_cover'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image_cover' ) );
			}



			$output['error'] = preview_error( $error );
			// end check and return validate data

			if ( empty( $output['error']  ) ) 
			{

				$this->career_model->add( $this->input->post() );
				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/career' );

			}
		}

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );

	}
	

	public function career_edit( $id = '' )
	{

		$output['this_title_page'] = 'Career Edit';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Career' => site_url('site-admin/career') , 'Career Edit' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Career';

		$output['show_data'] = $this->career_model->get_data( $id );

		$error = array();

		if ( $this->input->post() ) 
		{
			$data_input = $this->input->post();

			// check and return validate data
			$validate_data = array( 'title' , 'image_cover' );
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

			if ( empty( $data_input['image_cover'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image_cover' ) );
			}

			$output['error'] = preview_error( $error );
			// end check and return validate data

			if ( empty( $output['error']  ) ) 
			{

				$this->career_model->edit( $id , $this->input->post() );
				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/career' );

			}
		}


		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );
		
	}	


	public function career_delete( $id = '' )
	{
		$this->career_model->delete( $id );
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
				$this->db->update( 'career' );

			}

			$this->session->set_flashdata( 'form_status', preview_success() );
		}
		redirect( 'site-admin/career' );
	}

}