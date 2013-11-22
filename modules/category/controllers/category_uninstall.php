<?php
/**
*
* Block comment
*
**/

class project_list_uninstall extends admin_controller {
	
	
	public $module_system_name = 'project_list';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'project_list' ) ) {
			$sql = 'DROP TABLE `'.$this->db->dbprefix('project_list').'`;';
			$this->db->query( $sql );
		}
		
		// uninstall
		// $this->db->set( 'module_install', '0' );
		// $this->db->where( 'module_system_name', $this->module_system_name );
		// $this->db->update( 'modules' );
		// disable too
		$this->load->model( 'modules_model' );
		$this->modules_model->do_deactivate( $this->module_system_name );
		echo 'Uninstall completed. <a href="#" onclick="window.history.go(-1);">Go back</a>';
	}
	

}

