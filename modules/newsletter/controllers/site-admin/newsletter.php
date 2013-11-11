<?php

class newsletter extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model( 'newsletter_model' );
	}
	 
	
	function index() 
	{
		$output['this_title_page'] = 'Newsletter';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Newsletter' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Newsletter';

		$output['data_list'] = $this->newsletter_model->get_list();

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

	public function newsletter_delete( $id = '' )
	{
		$this->newsletter_model->delete( $id );
		echo "1";
	}

}