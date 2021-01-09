<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 26/7/18
 * Time: 12:34 PM
 */
$config = array(
	'error_prefix' => '<span class="frm_error_msg">',
	'error_suffix' => '</span>',
	'add_menu' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'help_name',
			'label' => 'Hint',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'controller',
			'label' => 'Controller',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'method',
			'label' => 'Method',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_parent',
			'label' => 'Parent ID',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'level',
			'label' => 'Level',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'display_orders',
			'label' => 'Display Order',
			'rules' => 'trim|numeric|required'
		)
//		array(
//			'field' => 'menu_icon',
//			'label' => 'Menu Icon',
//			'rules' => 'trim|required'
//		)
	),
	'edit_menu' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'help_name',
			'label' => 'Hint',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'controller',
			'label' => 'Controller',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'method',
			'label' => 'Method',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_parent',
			'label' => 'Parent ID',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'level',
			'label' => 'Level',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'display_orders',
			'label' => 'Display Order',
			'rules' => 'trim|numeric|required'
		)
//		array(
//			'field' => 'menu_icon',
//			'label' => 'Menu Icon',
//			'rules' => 'trim|required'
//		)
	),
	'add_submenu' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'help_name',
			'label' => 'Hint',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'controller',
			'label' => 'Controller',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'method',
			'label' => 'Method',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_parent',
			'label' => 'Parent ID',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'level',
			'label' => 'Level',
			'rules' => 'trim|numeric|required'
		),
		array(
			'field' => 'display_orders',
			'label' => 'Display Order',
			'rules' => 'trim|numeric|required'
		)
	),
	'edit_sub_menu' => array(
		array(
			'field' => 'menuName[]',
			'label' => 'Menu Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'orderNumber[]',
			'label' => 'Order Number',
			'rules' => 'trim|numeric|required'
		)
	)
);
?>
