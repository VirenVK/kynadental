<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 17/5/19
 * Time: 12:07 AM
 */
class User_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function profileDetail($id)
	{
		$result = array();
		$fields = "u.*";
		$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');
		$this->db->where('u.id_user',$id);
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->row_array();
		}
		return $result;
	}

	function updateProfile($id,$postVal=array())
	{
		$name = explode(" ", $postVal['full_name']);
		$first_name = $name[0];
		$last_name = $name[1];

		$data = array(
			'first_name'		=> $first_name,
			'last_name'			=> $last_name,
			'email'				=> $postVal['email'],
			'phone'				=> $postVal['phone'],
			'nationality'		=> $postVal['nationality'],
			'gender'			=> $postVal['gender'],
			'dob'				=> $postVal['dob'],
			'state1'			=> $postVal['state1'],
			'city1'				=> $postVal['city1'],
			'address1'			=> $postVal['address1'],
			'pin_code1'			=> $postVal['pin_code1'],
			'modified_at'		=> getCurrentDateTime(),
			'modified_by'		=> $id
		);
		$this->db->where('id_user',$id);
		if($this->db->update(TBL_USERS,$data)){
			return array('status' => STATUS_SUCCESS, 'msg' => 'Profile Updated Successfully');
		}
		return array('status' => STATUS_FAIL, 'msg' => 'Failed to Update');
	}

	function updatePassword($id,$postVal=array())
	{
		$data = array(
			'password'		=> md5($postVal['cnfpassword'])
		);
		$this->db->where('id_user',$id);
		if($this->db->update(TBL_LOGIN,$data)){
			return array('status' => STATUS_SUCCESS, 'msg' => 'Password Updated Successfully');
		}
		return array('status' => STATUS_FAIL, 'msg' => 'Failed to Update');
	}

	function getVendorList($postVal = array())
	{
		$result = array();
		if(isset($postVal['ps'])) {		
			$result = array('' => 'Please Select');
		}
		$fields = "u.id_user,u.user_code,u.first_name,u.last_name,u.phone";
		$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');

		//$this->db->where(array('u.id_user'=>$postVal['id_user']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
			/*foreach($result as $val){
				$result = $val['id_user']] = $val['user_code'];
			}*/
		}
		return $result;
	}

	function getVendorDetails($postVal = array())
    {
    	$result = array();
    	if (!empty($postVal['id'])) {
    	$fields = "u.phone,u.first_name,u.last_name";
    	$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');
		$this->db->where(array('u.id_user'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
    	}
    }
//End
}
?>
