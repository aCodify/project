<?php

class news extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('news/news_model');
	}
	 
	
	function index() 
	{
		$output['form_status'] = $this->session->flashdata( 'form_status' );
		$output['this_title_page'] = 'News&Promotion';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'News&Promotion' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'News&Promotion';


		$output['data_list'] = $this->news_model->get_list();

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );

	}// index
	

	public function news_add()
	{

		if ( $this->input->post() ) 
		{
			// set value 
			$error = array();
			$data_input = $this->input->post();
			// end set value

			// check and return validate data
			$validate_data = array( 'title' , 'date' );
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

			if ( empty( $data_input['select_cover'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'select_cover' ) );
			}
			else
			{
				if ( $data_input['select_cover'] == 1 ) 
				{
					if ( empty( $data_input['image_name_cover'] ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image_name_cover' ) );
					}
				} 
				else 
				{
					if ( empty( $data_input['youtube_id_cover'] ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( 'youtube_id_cover' ) );
					}
				}
			}			

			$output['error'] = preview_error( $error );
			// end check and return validate data


			if ( empty( $output['error']  ) ) 
			{
				
				$this->news_model->add( $this->input->post() );
				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/news' );
			}

		}// end post

		$output['this_title_page'] = 'News&Promotion Add';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'News&Promotion' => site_url('site-admin/news') , 'News&Promotion Add' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'News&Promotion';

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );

	}
	

	public function news_edit( $id = '' )
	{

		$output['this_title_page'] = 'News&Promotion Edit';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'News&Promotion' => site_url('site-admin/news') , 'News&Promotion Edit' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'News&Promotion';


		$output['show_data'] = $this->news_model->get_data( $id );


		if ( $output['show_data']['select_cover'] == 1 ) 
		{
			$output['show_data']['image_name_cover'] = $output['show_data']['data_cover'];
		}
		else
		{
			$output['show_data']['youtube_id_cover'] = $output['show_data']['data_cover'];
		}

		$output['show_data']['name_image'] = $this->news_model->get_group_gallery( $output['show_data']['group_gallery'] );

		$output['show_data']['id_youtube'] = $this->news_model->get_group_youtube( $output['show_data']['group_youtube'] );		

		if ( $this->input->post() ) 
		{
			// set value 
			$error = array();
			$data_input = $this->input->post();
			// end set value
	

			// check and return validate data
			$validate_data = array( 'title' , 'date' );
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

			if ( empty( $data_input['select_cover'] ) ) 
			{
				$error[] = 'Please enter information '.remove_underscore( ucfirst( 'select_cover' ) );
			}
			else
			{
				if ( $data_input['select_cover'] == 1 ) 
				{
					if ( empty( $data_input['image_name_cover'] ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( 'image_name_cover' ) );
					}
				} 
				else 
				{
					if ( empty( $data_input['youtube_id_cover'] ) ) 
					{
						$error[] = 'Please enter information '.remove_underscore( ucfirst( 'youtube_id_cover' ) );
					}
				}
			}			

			$output['error'] = preview_error( $error );
			// end check and return validate data


			if ( empty( $output['error']  ) ) 
			{
				
				$this->news_model->edit( $id , $this->input->post() , $output['show_data']['group_gallery'] , $output['show_data']['group_youtube'] );

				$this->session->set_flashdata( 'form_status', preview_success() );
				redirect( 'site-admin/news' );
			}

		}// end post




		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/form_view' , $output );
		
	}	


	public function news_delete( $id = '' )
	{
		$this->news_model->delete( $id );
		echo "1";
	}	






}