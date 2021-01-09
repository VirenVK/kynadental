<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 28/11/19
 * Time: 12:15 PM
 */
$config = array(
	'error_prefix' => '<span class="frm_error_msg">',
	'error_suffix' => '</span>',
	'add_master' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),

	),
	'edit_master' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required'
		),

	)
);