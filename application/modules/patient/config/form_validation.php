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
	'add_employee' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required|max_length[20]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required|max_length[20]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|callback_check_unique_email|valid_emails'
		),
		array(
			'field' => 'phone',
			'label' => 'Mobile No.',
			'rules' => 'trim|required|max_length[15]'
		),
		array(
			'field' => 'alternate_number',
			'label' => 'Alternative Mobile No.',
			'rules' => 'trim|max_length[15]'
		),
		array(
			'field' => 'nationality',
			'label' => 'Nationality',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'dob',
			'label' => 'Date of Birth',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'country1',
			'label' => 'Country',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'state1',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'city1',
			'label' => 'City',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'pin_code1',
			'label' => 'Pin Code',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address1',
			'label' => 'Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'country2',
			'label' => 'Country',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'state2',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'city2',
			'label' => 'City',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'pin_code2',
			'label' => 'Pin Code',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address2',
			'label' => 'Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'roles',
			'label' => 'Role',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'department',
			'label' => 'Department',
			'rules' => 'trim|required'
		)
	),
	
	'edit_employee' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required|max_length[20]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required|max_length[20]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_emails'
		),
		array(
			'field' => 'phone',
			'label' => 'Mobile No.',
			'rules' => 'trim|required|max_length[15]'
		),
		array(
			'field' => 'alternate_number',
			'label' => 'Alternative Mobile No.',
			'rules' => 'trim|max_length[15]'
		),
		array(
			'field' => 'nationality',
			'label' => 'Nationality',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'dob',
			'label' => 'Date of Birth',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'country1',
			'label' => 'Country',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'state1',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'city1',
			'label' => 'City',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'pin_code1',
			'label' => 'Pin Code',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address1',
			'label' => 'Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'country2',
			'label' => 'Country',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'state2',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'city2',
			'label' => 'City',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'pin_code2',
			'label' => 'Pin Code',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address2',
			'label' => 'Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'roles',
			'label' => 'Role',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'department',
			'label' => 'Department',
			'rules' => 'trim|required'
		)
	),
	'manage_company_code' => array(
		array(
			'field' => 'id_company_code[]',
			'label' => 'Company Code',
			'rules' => 'trim|required',
			'errors'=> array(
				'required' => 'Select atleast One Company code'
			)
		)
	)
);
?>
