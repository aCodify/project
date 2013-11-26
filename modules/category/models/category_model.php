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
        $this->db->order_by('mark_sort', 'ASC');
    	$query = $this->db->get();
    	$data = $query->result();
    	return $data;
    }

    public function add( $info = array() )
    {
 		$this->db->set( 'category_name', $info[ 'category_name' ] );
 		$this->db->set( 'sub_id', $info[ 'sub_id' ] );
        $this->db->set( 'category_title', $info[ 'category_title' ] );
        $this->db->set( 'category_detail', $info[ 'category_detail' ] );

        if ( empty( $info['status'] )  ) 
        {
            $this->db->set( 'status', 0 );
        }
        else
        {
            $this->db->set( 'status', 1 );
        }

        // set endcode slug url
        if ( ! empty( $info['slug'] ) ) 
        {
            // check data in table Do not repeat.
            $info['slug'] = $this->generate_slug( $info['slug'] );

            $this->db->set( 'slug', $info['slug'] );
            $this->db->set( 'slug_encode', md5( $info['slug'] ) );
        }
        else
        {
            // check data in table Do not repeat.
            $info['category_name'] = $this->generate_slug( $info['category_name'] );

            $this->db->set( 'slug', $info['category_name'] );
            $this->db->set( 'slug_encode', md5( $info['category_name'] ) );
        }

 		$this->db->insert( 'category' );
 		return true;
    }

    public function get_date( $id = '' , $use = 'admin' )
    {
    	$this->db->from( 'category AS a' );
    	if ( $use != 'admin' ) 
    	{
    		$this->db->where( 'a.status', 1 );
    	}
    	$this->db->where( 'a.id', $id );
    	$query = $this->db->get();
		$data = $query->row_array();    	
    	return $data;
    }


    /**
    *
    * FUNCTION SLUG AND KEYWORDS -----------------------------------
    *
    **/


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

    //  END SLUG --------------------------------------------------------



}