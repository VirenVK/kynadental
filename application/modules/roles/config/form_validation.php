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
	'add_role' => array(
		array(
			'field' => 'id_department',
			'label' => 'Department',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'name',
			'label' => 'Role Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'is_active',
			'label' => 'Status',
			'rules' => 'trim|required|in_list[Y,N]',
			'errors' => array(
				'in_list' => '%s Accept only Enable or Disable!'
			)
		)
	),
	'edit_role' => array(
		array(
			'field' => 'id_department',
			'label' => 'Department',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_role',
			'label' => 'Id',
			'rules' => 'trim|required'
		),array(
			'field' => 'name',
			'label' => 'Role Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'is_active',
			'label' => 'Status',
			'rules' => 'trim|required|in_list[Y,N]',
			'errors' => array(
				'in_list' => '%s Accept only Enable or Disable!'
			)
		)
	)
);
?>
