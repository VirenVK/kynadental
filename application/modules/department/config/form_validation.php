<?php
$config = array(
		'error_prefix' => '<span class="frm_error_msg">',
		'error_suffix' => '</span>',
		'add_department' => array(
		array(
			'field' => 'dept_short_name',
			'label' => 'Department',
			'rules' => 'trim|required|alpha_numeric|max_length[6]|callback_check_department_code'
		),
		array(
			'field' => 'name',
			'label' => 'Department Name',
			'rules' => 'trim|required'
		)
		
	   ),
		'edit_department' => array(
		array(
			'field' => 'dept_short_name',
			'label' => 'Department',
			'rules' => 'trim|required|alpha_numeric|max_length[6]|callback_check_department_code'
		),
		array(
			'field' => 'name',
			'label' => 'Department Name',
			'rules' => 'trim|required'
		)
		
	)
);
?>
