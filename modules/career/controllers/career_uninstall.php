<?php
/**
*
* Block comment
*
**/

class career_uninstall extends admin_controller {
	
	
	public $module_system_name = 'career';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'content_config' ) ) 
		{
			$this->db->where( 'type_config', 'career_title' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( !empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'career_title' );
				$this->db->delete( 'content_config' );
			}

			$this->db->where( 'type_config', 'career_slug' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( !empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'career_slug' );
				$this->db->delete( 'content_config' );
			}

			$this->db->where( 'type_config', 'career_tag_keywords' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( !empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'career_tag_keywords' );
				$this->db->delete( 'content_config' );
			}

			$this->db->where( 'type_config', 'career_tag_description' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( !empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'career_tag_description' );
				$this->db->delete( 'content_config' );
			}
		}

		if ( $this->db->table_exists( 'career' ) ) {
			$sql = 'DROP TABLE `'.$this->db->dbprefix('career').'`;';
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

