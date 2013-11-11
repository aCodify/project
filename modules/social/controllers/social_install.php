<?php
/**
*
* Jiryau@bizidea.co.th
* vision 0.2
* Date 26-09-56
*
**/

class social_install extends admin_controller {
	
	
	public $module_system_name = 'social';

	
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

		if ( !$this->db->table_exists( 'social' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('social').'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `link_url` text COLLATE utf8_unicode_ci NOT NULL,
				  `image` text COLLATE utf8_unicode_ci NOT NULL,
				  `order_sort` int(11) NOT NULL,
				  `open_this_page` int(1) NOT NULL,
				  `status` int(1) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;';
			$this->db->query( $sql );

		}				

		$this->db->set( 'module_install', '1' );
		$this->db->where( 'module_system_name', $this->module_system_name );
		$this->db->update( 'modules' );
		// go back
		redirect( 'site-admin/module' );
	}

	
}

