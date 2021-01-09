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
	'profile' => array(
		array(
			'field' => 'first_name',
			'label' => 'Full Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'phone',
			'label' => 'Phone Number',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required'
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
			'label' => 'DOB',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address1',
			'label' => 'Address',
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
			'label' => 'PO Box',
			'rules' => 'trim|required'
		)
	),
	'password' => array(
		array(
			'field' => 'oldpassword',
			'label' => 'Old Password',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'password',
			'label' => 'New Password',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'cnfpassword',
			'label' => 'Confirm Password',
			'rules' => 'trim|required'
		)
	)
);
?>
