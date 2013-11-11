<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class news_model extends CI_Model 
{

    function __construct() {
        parent::__construct();
    }// __construct


    public function add( $info = '' )
    {

        // echo '<pre>';
        // print_r( $info );
        // echo '</pre>';
        // die();


        $this->db->set( 'type', $info['type'] );
        $this->db->set( 'title', $info['title'] );
        $this->db->set( 'date', strtotime( set_time_to_strtotime( $info['date'] ) ) );
        $this->db->set( 'detail', $info['detail'] );
        $this->db->set( 'activity', $info['activity'] );
        $this->db->set( 'select_cover', $info['select_cover'] );
        $this->db->set( 'order_sort', $info['order_sort'] );

        if ( $info['select_cover'] == 1 ) 
        {
            $this->db->set( 'data_cover', $info['image_name_cover'] );
        } 
        else 
        {
            $this->db->set( 'data_cover', $info['youtube_id_cover'] );
        }
      
        $group_code = alphanumeric_rand(8);
        $this->db->set( 'group_gallery', $group_code.'_gallery' );
        $this->db->set( 'group_youtube', $group_code.'_youtube' );




        
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


        $this->db->set( 'tag_keywords', $info['tag_keywords'] );
        $this->db->set( 'tag_description', $info['tag_description'] );

        $info['highlight'] = ( ! empty( $info['highlight'] ) ) ? 1 : 0 ;
        $this->db->set( 'highlight', $info['highlight'] );

        $info['status'] = ( ! empty( $info['status'] ) ) ? 1 : 0 ;
        $this->db->set( 'status', $info['status'] );

        $this->db->insert( 'content' );


        if ( ! empty( $info['name_image'] ) ) 
        {
            foreach ( $info['name_image'] as $key => $value ) 
            {
                $this->db->set( 'group_gallery', $group_code.'_gallery' );
                $this->db->set( 'name_image', $value );
                $this->db->insert( 'content_ref_images' );

            }

        }

        if ( ! empty( $info['id_youtube'] ) ) 
        {
            foreach ( $info['id_youtube'] as $key => $value ) 
            {
                $this->db->set( 'group_youtube', $group_code.'_youtube' );
                $this->db->set( 'id_youtube', $value );
                $this->db->insert( 'content_ref_youtube' );

            }

        }


    }

    // get data list  
    public function get_list( )
    {
        $query = $this->db->get( 'content' );
        $data = $query->result();
        return $data;
    }    

    // get data one product for edit
    public function get_data( $id = '' , $show = 'admin' )
    {
        $this->db->where( 'id', $id );
        if ( $show != 'admin' ) 
        {
            $this->db->where( 'status', 1 );
        }
        $query = $this->db->get( 'content' );
        $data = $query->row_array();
        $data['date'] = date( 'd/m/Y' , $data['date'] );
        return $data;
    }

    // get all image in this gallery
    public function get_group_gallery( $info = '' )
    {
        $this->db->where( 'group_gallery', $info );
        $query = $this->db->get( 'content_ref_images' );
        $data = $query->result();

        $data_tmp = array();
        foreach ( $data as $key => $value ) 
        {
            $data_tmp[] = $value->name_image;
        }
        return $data_tmp;
    }

    // get all id youtube in this group
    public function get_group_youtube( $info = '' )
    {
        $this->db->where( 'group_youtube', $info );
        $query = $this->db->get( 'content_ref_youtube' );
        $data = $query->result();

        $data_tmp = array();
        foreach ( $data as $key => $value ) 
        {
            $data_tmp[] = $value->id_youtube;
        }
        return $data_tmp;
    }    


    // edit data 
    public function edit( $id = '' , $info = '' , $group_gallery = '' , $group_youtube = '' )
    {

        $this->db->set( 'type', $info['type'] );
        $this->db->set( 'title', $info['title'] );
        $this->db->set( 'date', strtotime( set_time_to_strtotime( $info['date'] ) ) );
        $this->db->set( 'detail', $info['detail'] );
        $this->db->set( 'activity', $info['activity'] );
        $this->db->set( 'select_cover', $info['select_cover'] );
        $this->db->set( 'order_sort', $info['order_sort'] );

        if ( $info['select_cover'] == 1 ) 
        {
            $this->db->set( 'data_cover', $info['image_name_cover'] );
        } 
        else 
        {
            $this->db->set( 'data_cover', $info['youtube_id_cover'] );
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
            $info['title'] = $this->generate_slug( $info['title'] );

            $this->db->set( 'slug', $info['title'] );
            $this->db->set( 'slug_encode', md5( $info['title'] ) );
        }


        $this->db->set( 'tag_keywords', $info['tag_keywords'] );
        $this->db->set( 'tag_description', $info['tag_description'] );

        $info['highlight'] = ( ! empty( $info['highlight'] ) ) ? 1 : 0 ;
        $this->db->set( 'highlight', $info['highlight'] );

        $info['status'] = ( ! empty( $info['status'] ) ) ? 1 : 0 ;
        $this->db->set( 'status', $info['status'] );

        $this->db->where( 'id', $id );

        $this->db->update( 'content' );

        $this->db->where( 'group_gallery', $group_gallery );
        $this->db->delete( 'content_ref_images' );
        if ( ! empty( $info['name_image'] ) ) 
        {
            foreach ( $info['name_image'] as $key => $value ) 
            {
                $this->db->set( 'group_gallery', $group_gallery );
                $this->db->set( 'name_image', $value );
                $this->db->insert( 'content_ref_images' );
            }
        }

        $this->db->where( 'group_youtube', $group_youtube );
        $this->db->delete( 'content_ref_youtube' );
        if ( ! empty( $info['id_youtube'] ) ) 
        {
            foreach ( $info['id_youtube'] as $key => $value ) 
            {
                $this->db->set( 'group_youtube', $group_youtube );
                $this->db->set( 'id_youtube', $value );
                $this->db->insert( 'content_ref_youtube' );
            }
        }

    }

    // delete data
    public function delete( $id = '')
    {

        // get data id code grup gallery and group youtube
        $this->db->select( 'group_gallery , group_youtube' );
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'content' );
        $data_code = $query->row();


        $this->db->where( 'group_gallery', $data_code->group_gallery );
        $this->db->delete( 'content_ref_images' );
        // end delete image group

        $this->db->where( 'group_youtube', $data_code->group_youtube );
        $this->db->delete( 'content_ref_youtube' ); 
        // end delete id youtube

        $this->db->where( 'id', $id );
        $this->db->delete( 'content' );
        // end delete data content

    }

    // check url slug in database has empty
    public function check_slug_empty( $info = '' )
    {
        $this->db->where( 'slug', $info );
        $query = $this->db->get( 'content' );
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
        $query = $this->db->get( 'content' );
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
        $items = $this->db->select( 'slug' )->like( 'slug', $title , 'right')->get( 'content' )->result();

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