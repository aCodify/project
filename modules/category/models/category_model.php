<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class category_model extends CI_Model 
{

    function __construct() {
        parent::__construct();
    }// __construct


    public function get_list( $use = 'admin' )
    {
    	if ( $use != 'admin' ) 
    	{
    		$this->db->where( 'c.status', 1 );
    	}
    	$this->db->from( 'category AS c' );
    	$this->db->where( 'c.sub_id', '' );
    	$query = $this->db->get();
    	$data = $query->result();
    	return $data;
    }

    public function add( $info = array() )
    {
 		$this->db->set( 'project_name', $info[ 'project_name' ] );
 		$this->db->set( 'link_file', $info[ 'link_file' ] );
 		$this->db->set( 'status', 1 );
 		$this->db->set( 'start_date', strtotime( set_time_to_strtotime( $info[ 'start_date' ] ) ) );
 		$this->db->set( 'end_date', strtotime( set_time_to_strtotime( $info[ 'end_date' ] ) ) );
 		$this->db->insert( 'project_list' );

 		$last_id = $this->db->insert_id();

 		$this->db->set( 'user_name', $info[ 'user_name' ] );
 		$this->db->set( 'password', md5( $info[ 'password' ] ) );
 		$this->db->set( 'project_id', $last_id );
 		$this->db->set( 'status', 1 );
 		$this->db->insert( 'member_project' );
 		return true;
    }

    public function get_date( $id = '' , $use = 'admin' )
    {
    	$this->db->from( 'project_list AS pl' );
    	if ( $use != 'admin' ) 
    	{
    		$this->db->where( 'pl.status', 1 );
    	}
    	$this->db->join( 'member_project AS mp', 'pl.id = mp.project_id', 'left' );
    	$this->db->where( 'pl.id', $id );
    	$query = $this->db->get();
		$data = $query->row_array();    	
    	return $data;
    }


}