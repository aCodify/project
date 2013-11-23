<?php
/**
*
* Block comment
*
**/

class project_list_uninstall extends admin_controller {
	
	
	public $module_system_name = 'category';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'category' ) ) 
		{
			$sql = 'DROP TABLE `'.$this->db->dbprefix('category').'`;';
			$this->db->query( $sql );
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

