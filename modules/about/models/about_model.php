<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class about_model extends CI_Model 
{

    function __construct() {
        parent::__construct();
    }// __construct


    public function add( $info = '' )
    {

        $this->db->set( 'title', $info['title'] );
        $this->db->set( 'detail', $info['detail'] );
        $this->db->set( 'year', $info['year'] );
        
        $this->db->set( 'tag_keywords', $info['tag_keywords'] );
        $this->db->set( 'tag_description', $info['tag_description'] );

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
            $info['title'] = $this->generate_slug( $info['title'] );

            $this->db->set( 'slug', $info['title'] );
            $this->db->set( 'slug_encode', md5( $info['title'] ) );
        }



        $this->db->insert( 'about' );        

    }

    public function get_year()
    {
        $info = array();
        $this->db->select( 'year' );
        $query = $this->db->get( 'about' );
        $data = $query->result();
        if ( ! empty( $data ) ) 
        {
            foreach ( $data as $key => $value ) 
            {
                $info[] = $value->year;
            }
        }
        return $info;
    }


    // get data list  
    public function get_list( )
    {

        $this->db->order_by( 'year', 'desc' );
        $query = $this->db->get( 'about' );
        $data = $query->result();
        return $data;    

    }    

    // get data one product
    public function get_data( $info = '' )
    {
        $this->db->where( 'id', $info );
        $query = $this->db->get('about');
        $data = $query->result();
        $data = ( ! empty( $data[0] ) ) ? $data[0] : array() ;
        return $data;
    }

    // edit data 
    public function edit( $id = '' , $info = '' )
    {
        // check data error;
        if ( empty( $id ) ) 
        {
            return false;
        }

        $this->db->set( 'title', $info['title'] );
        $this->db->set( 'detail', $info['detail'] );
        $this->db->set( 'year', $info['year'] );

        $this->db->set( 'tag_keywords', $info['tag_keywords'] );
        $this->db->set( 'tag_description', $info['tag_description'] );

        // set endcode slug url
        if ( ! empty( $info['slug'] ) ) 
        {
            $info['slug'] = $this->generate_slug( $info['slug'] , $id );
            // check data in table Do not repeat.
            if ( $this->check_slug( $id , $info['slug']  ) ) 
            {
                $this->db->set( 'slug', $info['slug'] );
                $this->db->set( 'slug_encode', md5( $info['slug'] ) );
            }


        }
        else
        {
         
            $info['title'] = $this->generate_slug( $info['title'] , $id );
            // check data in table Do not repeat.
            if ( $this->check_slug( $id , $info['title']  ) ) 
            {
                $this->db->set( 'slug', $info['title'] );
                $this->db->set( 'slug_encode', md5( $info['title'] ) );
            }

        }

        $this->db->where( 'id', $id );
        $this->db->update( 'about' );
    }

    // delete data
    public function delete( $id = '')
    {
        $this->db->where( 'id', $id );
        $this->db->delete( 'about' );
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