<?php

class popup extends MY_Controller {

	
	function __construct() 
	{
		parent::__construct();
	}
	
	
	function index() 
	{
		$output['data_video'] = ( $this->input->get('data_video') ) ? $this->input->get('data_video') : '' ;
		$this->load->view( 'index', $output );
	}// index

	function intro( $id = '' ) 
	{
		$output= '';

		$this->db->select( 'data_cover' );
		$this->db->where( 'select_cover', 3 );
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'intro_page' );
		$data = $query->row();

		$output['data_video'] = ( ! empty( $data->data_cover ) ) ? $data->data_cover : '' ;

		$this->load->view( 'index', $output );
	}// index

	public function youtube_url()
	{
		$output['data_video'] = ( $this->input->get('data_video') ) ? $this->input->get('data_video') : '' ;
		$this->load->view( 'index', $output );
	}
	

}
