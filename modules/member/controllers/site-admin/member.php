<?php

class member extends admin_controller {

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('member/member_model');
	}
	 
	
	function index() 
	{
		$output['this_title_page'] = 'Member';
		$breadcrumb = array( 'Home' => site_url('site-admin') , 'Member' => '#' );
		$output['this_breadcrumb_page'] = $breadcrumb;
		$output['hover_menu'] = 'Member';


		$output['data_list'] = $this->member_model->get_list();

		// head tags output ##############################
		$output['page_title'] = $this->html_model->gen_title( $this->lang->line( 'admin_home' ) );		
		$this->generate_page( 'site-admin/admin_index' , $output );
	}// index
	

	public function member_delete( $id = '' )
	{
		$this->member_model->delete( $id );
		echo "1";
	}

}