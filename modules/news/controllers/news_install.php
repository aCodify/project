<?php
/**
*
* Jiryau@bizidea.co.th
* vision 0.2
* Date 26-09-56
*
**/

class news_install extends admin_controller {
	
	
	public $module_system_name = 'news';

	
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
		if ( !$this->db->table_exists( 'content' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('content').'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `type` int(1) NOT NULL COMMENT \'1 = news , 2 = promotion\',
				  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `date` int(15) NOT NULL,
				  `detail` text COLLATE utf8_unicode_ci NOT NULL,
				  `activity` text COLLATE utf8_unicode_ci NOT NULL,
				  `select_cover` int(11) NOT NULL COMMENT \'1 = image , 2 = youtube\',
				  `data_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `group_gallery` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				  `group_youtube` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `tag_keywords` text COLLATE utf8_unicode_ci NOT NULL,
				  `tag_description` text COLLATE utf8_unicode_ci NOT NULL,
				  `slug_encode` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
				  `highlight` int(11) NOT NULL COMMENT \'0 = ปิด , 1 = เปิด\',
				  `status` int(11) NOT NULL COMMENT \'0 = ปิด , 1 = เปิด\',
				  `order_sort` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;';
			$this->db->query( $sql );
		}

		if ( !$this->db->table_exists( 'content_ref_images' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('content_ref_images').'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name_image` text COLLATE utf8_unicode_ci NOT NULL,
				  `group_gallery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;';
			$this->db->query( $sql );
		}

		if ( !$this->db->table_exists( 'content_ref_youtube' ) ) {
			$sql = 'CREATE TABLE `'.$this->db->dbprefix('content_ref_youtube').'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_youtube` text COLLATE utf8_unicode_ci NOT NULL,
				  `group_youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

