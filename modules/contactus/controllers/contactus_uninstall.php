<?php
/**
*
* Jiryau@bizidea.co.th
* vision 0.2
* Date 26-09-56
*
**/

class contactus_uninstall extends admin_controller {
	
	
	public $module_system_name = 'contactus';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'content_config' ) ) {

			$this->db->where( 'type_config', 'contact_google_code' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_google_code' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_address' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_address' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_work_time' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_work_time' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_travel' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_travel' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_phone' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_phone' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_slug' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_slug' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_tag_keywords' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_tag_keywords' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_tag_description' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_tag_description' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'contact_email' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'contact_email' );
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

