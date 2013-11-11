<?php
/**
*
* Jiryau@bizidea.co.th
* vision 0.2
* Date 26-09-56
*
**/

class background_install extends admin_controller {
	
	
	public $module_system_name = 'background';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		$this->db->where( 'module_system_name', $this->module_system_name );
		$query = $this->db->get( 'modules' );
		if ( $query->num_rows() <= 0 ) {
			$query->free_result();
			echo 'Installed.';
			return null;
		}
		// install module.
		if ( !$this->db->table_exists( 'content_config' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('content_config').'` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `type_config` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  `content` text COLLATE utf8_unicode_ci NOT NULL,
			  `status` int(1) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;';
			$this->db->query( $sql );

		}

		$this->db->where( 'type_config', 'background_header_backgroud' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'background_header_backgroud' );
			$this->db->insert( 'content_config' );
		}

		// ----------

		$this->db->where( 'type_config', 'backgroung_body_backgroud' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'backgroung_body_backgroud' );
			$this->db->insert( 'content_config' );
		}

		// ----------


		$this->db->set( 'module_install', '1' );
		$this->db->where( 'module_system_name', $this->module_system_name );
		$this->db->update( 'modules' );
		// go back
		redirect( 'site-admin/module' );
	}

	
}

