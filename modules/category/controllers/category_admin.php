<?php
/**
*
* Block comment
*
**/

class project_list_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	/**
	 * _define_permission
	 * กำหนด permission ที่ method นี้ภายใน controller นี้ (ชื่อโมดูล_admin) สำหรับการทำงานแบบ module
	 * @return array
	 */
	function _define_permission() {
		return array( 'category_admin' => array( 'category_all_post', 'category_add_post', 'category_edit_post', 'category_delete_post' ) );
	}// _define_permission
	
	
	function admin_nav() {
		return '<li>' . anchor( '#', lang( 'about_admin' ), array( 'onclick' => 'return false' ) ) . '
			</li>';
	}// admin_nav
	
	
}