<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content_config_model extends CI_Model 
{
	function __construct() {
		parent::__construct();
	}// __construct

	public function add( $type = '' , $content = '' )
	{
		$this->db->where( 'type_config', $type );
		$this->db->set( 'content', $content );
		$this->db->update( 'content_config' );
	}

	public function get( $type = '' )
	{
		$this->db->where( 'type_config', $type );
		$query = $this->db->get( 'content_config' );
		$data = $query->row();
		return $info = ( empty( $data->content ) ) ? '' : $data->content ;
	}


}