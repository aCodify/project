<?php
/**
*
* Jiryau@bizidea.co.th
* vision 0.2
* Date 26-09-56
*
**/

class career_install extends admin_controller {
	
	
	public $module_system_name = 'career';

	
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

		if ( !$this->db->table_exists( 'career' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('career').'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `image_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `detail` text COLLATE utf8_unicode_ci NOT NULL,
				  `order_sort` int(11) NOT NULL,
				  `status` int(1) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;';
			$this->db->query( $sql );

		}

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
		
		$this->db->where( 'type_config', 'career_title' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'career_title' );
			$this->db->insert( 'content_config' );
		}

		// ----------

		$this->db->where( 'type_config', 'career_slug' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'career_slug' );
			$this->db->insert( 'content_config' );
		}

		// -----------

		$this->db->where( 'type_config', 'career_tag_keywords' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'career_tag_keywords' );
			$this->db->insert( 'content_config' );
		}

		// ------------

		$this->db->where( 'type_config', 'career_tag_description' );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();

		if ( empty( $data ) ) 
		{
			$this->db->set( 'type_config', 'career_tag_description' );
			$this->db->insert( 'content_config' );
		}

		// -----------						

		$this->db->set( 'module_install', '1' );
		$this->db->where( 'module_system_name', $this->module_system_name );
		$this->db->update( 'modules' );
		// go back
		redirect( 'site-admin/module' );
	}

	
}

