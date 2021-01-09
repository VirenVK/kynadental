<?php

$config = array(
	'error_prefix' => '<span class="frm_error_msg">',
	'error_suffix' => '</span>',
	'add_country' => array(
		array(
			'field' => 'name',
			'label' => 'Country',
			'rules' => 'trim|required|max_length[20]'
		)
		
	),
	'add_state' => array(
		array(
			'field' => 'id_country',
			'label' => 'Country',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'State',
			'rules' => 'trim|required|max_length[20]'
		)
	),
	'add_city' => array(
		array(
			'field' => 'id_country',
			'label' => 'Country',
			'rules' => 'required'
		),
		array(
			'field' => 'id_state',
			'label' => 'State',
			'rules' => 'required'
			),
		array(
			'field' => 'name',
			'label' => 'City',
			'rules' => 'trim|required|max_length[20]'
			)
		),
	'add_location' => array(
		array(
			'field' => 'id_country',
			'label' => 'Country',
			'rules' => 'required'
		),
		array(
			'field' => 'id_state',
			'label' => 'State',
			'rules' => 'required'
			),
		array(
			'field' => 'id_city',
			'label' => 'City',
			'rules' => 'required'
			),
		array(
			'field' => 'name',
			'label' => 'Location',
			'rules' => 'trim|required|max_length[20]'
			)
		)
	
);
?>
