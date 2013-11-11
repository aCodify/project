<?php
/**
*
* Block comment
*
**/

class background_uninstall extends admin_controller {
	
	
	public $module_system_name = 'background';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'content_config' ) ) {

			$this->db->where( 'type_config', 'background_header_backgroud' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'background_header_backgroud' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'backgroung_body_backgroud' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'backgroung_body_backgroud' );
				$this->db->delete( 'content_config' );
			}

			// ----------


		}
		
		// uninstall
		$this->db->set( 'module_install', '0' );
		$this->db->where( 'module_system_name', $this->module_system_name );
		$this->db->update( 'modules' );
		// disable too
		$this->load->model( 'modules_model' );
		$this->modules_model->do_deactivate( $this->module_system_name );
		echo 'Uninstall completed. <a href="#" onclick="window.history.go(-1);">Go back</a>';
	}
	

}

