<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class contactus_model extends CI_Model 
{

    function __construct() {
        parent::__construct();
    }// __construct


    public function add( $info = '' )
    {       
        $this->db->where( 'type_config', 'contact_google_code' );
        $this->db->set( 'content', $info['google_map_code'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_address' );
        $this->db->set( 'content', $info['address'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_work_time' );
        $this->db->set( 'content', $info['work_time'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_travel' );
        $this->db->set( 'content', $info['travel'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_phone' );
        $this->db->set( 'content', $info['phone'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_slug' );
        $this->db->set( 'content', $info['slug'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_tag_keywords' );
        $this->db->set( 'content', $info['tag_keywords'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_tag_description' );
        $this->db->set( 'content', $info['tag_description'] );
        $this->db->update( 'content_config' );
        
        $this->db->where( 'type_config', 'contact_email' );
        $this->db->set( 'content', $info['email'] );
        $this->db->update( 'content_config' );


    }

    // get data list  
    public function get_list( )
    {

    }    

    // get data one product
    public function get_data( $type_config = '' )
    {

    }

    // edit data 
    public function edit( $id = '' , $info = '' )
    {

    }

    // delete data
    public function delete( $id = '')
    {

    }

    // check url slug in database has empty
    public function check_slug_empty( $info = '' )
    {
        $this->db->where( 'slug', $info );
        $query = $this->db->get( 'about' );
        $data = $query->result();

        if ( ! empty( $data ) ) 
        {
            return count( $data );
        }

        return 0;

    }

    // chek slug have in id it
    public function check_slug( $id = '' , $info = '' )
    {
        $this->db->where( 'id', $id );
        $this->db->where( 'slug', $info );
        $query = $this->db->get( 'about' );
        $data = $query->result();
        if ( ! empty( $data ) ) 
        {
            return FALSE;
        }
        return TRUE;
    }


    /**
     * Generate slug url for article, check other record in database
     * ensure we get a unique url for each article, append duplicate number if neccessary
     *
     * @param String  $title     object name represention, eg. category name, article title , whatever
     * @param Integer $object_id id of object itselves
     * @return String
     **/
    public function generate_slug($title, $object_id = NULL)
    {
        $title = make_url($title, 255);

        // we may need to exclude object itselve sfrom checking
        if (is_numeric($object_id) AND $object_id > 0)
        {
            $this->db->where( 'id !=', $object_id );
        }
        
        // get all slug match with generated title
        $items = $this->db->select( 'slug' )->like( 'slug', $title , 'right')->get( 'about' )->result();

        // not found, we can use it
        if (empty($items))
        {
            return $title;
        }
        
        // start number tracking
        $number = 0;
        
        // find the most value number
        foreach ($items as $item)
        {
            if (preg_match('~^'.preg_quote($title).'-(?<number>\d+)$~', $item->slug, $match))
            {
                if ($match['number'] > $number)
                {
                    $number = $match['number'];
                }
            }
        }
        
        // add one to max number, this is the append number
        $number++;
        
        $title .= '-'.$number;
        
        return $title;
    }




}