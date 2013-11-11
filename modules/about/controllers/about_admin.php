<?php
/**
*
* Block comment
*
**/

class about_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	/**
	 * _define_permission
	 * กำหนด permission ที่ method นี้ภายใน controller นี้ (ชื่อโมดูล_admin) สำหรับการทำงานแบบ module
	 * @return array
	 */
	function _define_permission() {
		return array( 'blog_admin' => array( 'blog_all_post', 'blog_add_post', 'blog_edit_post', 'blog_delete_post' ) );
	}// _define_permission
	
	
	function admin_nav() {
		return '<li>' . anchor( '#', lang( 'about_admin' ), array( 'onclick' => 'return false' ) ) . '
			</li>';
	}// admin_nav
	
	
}