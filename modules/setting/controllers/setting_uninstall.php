<?php
/**
*
* Block comment
*
**/

class setting_uninstall extends admin_controller {
	
	
	public $module_system_name = 'setting';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		if ( $this->db->table_exists( 'content_config' ) ) {


			$this->db->where( 'type_config', 'setting_public_header_image' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_public_header_image' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_public_body_backgroud' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_public_body_backgroud' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_slug' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_slug' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_tag_keywords' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_tag_keywords' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_tag_description' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_tag_description' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_google_analytics_code' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_google_analytics_code' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_user_analytics' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_user_analytics' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_password_analytics' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_password_analytics' );
				$this->db->delete( 'content_config' );
			}

			// ----------

			$this->db->where( 'type_config', 'setting_id_code_analytics' );
			$query = $this->db->get( 'content_config' );
			$data = $query->row();

			if ( ! empty( $data ) ) 
			{
				$this->db->where( 'type_config', 'setting_id_code_analytics' );
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

