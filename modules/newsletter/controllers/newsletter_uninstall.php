<?php
/**
*
* Block comment
*
**/

class newsletter_uninstall extends admin_controller {
	
	
	public $module_system_name = 'newsletter';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'account_newsletter' ) ) {

			$this->db->where( 'type', 'newsletter' );
			$this->db->delete( 'account_newsletter' );

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

