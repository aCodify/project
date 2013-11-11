<?php
/**
*
* Block comment
*
**/

class news_uninstall extends admin_controller {
	
	
	public $module_system_name = 'news';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'content' ) ) {
			$sql = 'DROP TABLE `'.$this->db->dbprefix('content').'`;';
			$this->db->query( $sql );
		}
		if ( $this->db->table_exists( 'content_ref_images' ) ) {
			$sql = 'DROP TABLE `'.$this->db->dbprefix('content_ref_images').'`;';
			$this->db->query( $sql );
		}
		if ( $this->db->table_exists( 'content_ref_youtube' ) ) {
			$sql = 'DROP TABLE `'.$this->db->dbprefix('content_ref_youtube').'`;';
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

