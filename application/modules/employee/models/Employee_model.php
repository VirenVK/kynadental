<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 24/7/19
 * Time: 6:08 PM
 */
class Employee_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getUserList($postVal = array()){
		if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
			$result = 0;
		}else{
			$result = array();
		}
		$fields = "r.role_name,u.user_icon,u.first_name,u.last_name,u.email,u.phone,u.address1,u.id_user,u.pin_code1,u.is_active,l.id_login,coo.name AS country1, sto.name AS state1, cio.name AS city1, u.id_department AS department";
		$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');
		$this->db->join(TBL_LOGIN.' l','u.id_user = l.id_user','left');
		$this->db->join(TBL_ROLES.' r','u.id_role = r.id_role','left');
		$this->db->join(TBL_DEPARTMENT.' d','u.id_department = d.id_department','left');
		$this->db->join(TBL_LOCATION.' coo','u.country1 = coo.id','left');
		$this->db->join(TBL_LOCATION.' sto','u.state1 = sto.id','left');
		$this->db->join(TBL_LOCATION.' cio','u.city1 = cio.id','left');
		$this->db->where_not_in('u.id_role',array(1));
		if(!empty($postVal)){
			if(isset($postVal['email']) && strlen(trim($postVal['email'])) > 0){
				$where['u.email'] = trim($postVal['email']);
			}
			if(isset($postVal['is_employee'])){
				$where['u.is_employee'] = $postVal['is_employee'];
			}
			if(isset($postVal['name']) && strlen(trim($postVal['name'])) > 0){
				$this->db->like('u.first_name',trim($postVal['name']),'both');
			}
		}
		if(!empty($where)){
			$this->db->where($where);
		}
		/*Pagination Start*/
		if(isset($postVal['query_type']) && $postVal['query_type']=="pagination"){
			$pgArr = calculatePageNumber($postVal['page']);
			$this->db->limit($pgArr['n2'],$pgArr['n1']);
		}else if(isset($postVal['limited']) && ($postVal['limited'] > 0)){
			$this->db->limit($postVal['limited']);
		}
		/*Pagination End*/
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
				$result = $query->num_rows();
			}else{
				$result = $query->result_array();
			}
		}
		return $result;
	}

	function validate_employee($email){
		$result = array();
		$fields = "u.email";
		$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');
		$this->db->where('u.email',$email);
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			return true;
		}
		return false;
	}

	function addUser($postVal=array()){
		$user_code = $this->getDocumentNumber(array('doc_code'=>'EMP'));
		$data = array('user_code' => $user_code,
			'created_at'		=> getCurrentDateTime(),
			'created_by'		=> $postVal['action_by'],
			'id_user_type'		=> $postVal['id_user_type'],
			'id_role'			=> $postVal['roles'],
			'user_icon'			=> $postVal['image'],
			'first_name'		=> $postVal['first_name'],
			'last_name'			=> $postVal['last_name'],
			'email'				=> $postVal['email'],
			'phone'				=> $postVal['phone'],
			'alternate_number'	=> $postVal['alternate_number'],
			'id_nationality'	=> $postVal['nationality'],
			'id_department'     => $postVal['department'],
			'gender'			=> $postVal['gender'],
			'dob'				=> $postVal['month'].'-'.$postVal['day'],
			'state1'			=> $postVal['state1'],
			'city1'				=> $postVal['city1'],
			'country1'			=> $postVal['country1'],
			'address1'			=> $postVal['address1'],
			'pin_code1'			=> $postVal['pin_code1'],
			'state2'			=> $postVal['state2'],
			'city2'				=> $postVal['city2'],
			'country2'			=> $postVal['country2'],
			'address2'			=> $postVal['address2'],
			'pin_code2'			=> $postVal['pin_code2'],
			'is_employee'			=> $postVal['is_employee']
		);
		if($this->db->insert(TBL_USERS,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Employee Added Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Employee Not Added.');
	}

	function updateEmployee($id,$postVal=array()){
		$data = array(
			'user_icon'			=> $postVal['image'],
			'first_name'		=> $postVal['first_name'],
			'last_name'			=> $postVal['last_name'],
			'email'				=> $postVal['email'],
			'phone'				=> $postVal['phone'],
			'alternate_number'	=> $postVal['alternate_number'],
			'id_nationality'	=> $postVal['nationality'],
			'id_department'     => $postVal['department'],
			'gender'			=> $postVal['gender'],
			'dob'				=> $postVal['dob'],
			'state1'			=> $postVal['state1'],
			'city1'				=> $postVal['city1'],
			'country1'			=> $postVal['country1'],
			'address1'			=> $postVal['address1'],
			'pin_code1'			=> $postVal['pin_code1'],
			'state2'			=> $postVal['state2'],
			'city2'				=> $postVal['city2'],
			'country2'			=> $postVal['country2'],
			'address2'			=> $postVal['address2'],
			'pin_code2'			=> $postVal['pin_code2']
		);
		$this->db->where('id_user',$id);
		if($this->db->update(TBL_USERS,$data)){
			return array('status' => STATUS_SUCCESS, 'msg' => 'Employee Updated Successfully');
		}
		return array('status' => STATUS_FAIL, 'msg' => 'Failed to Update');
	}

	function getEmpDetails($postVal=array()){
		$result = array();
		$fields = "u.country2,u.state2,u.city2,u.country1,u.state1,u.city1,u.id_user,u.id_user_type,u.id_role,u.first_name,u.last_name,u.user_icon,u.email,u.phone,u.alternate_number,u.id_nationality,
		u.gender,u.dob,coo.name AS country1, sto.name AS state1, cio.name AS city1,
		u.address1,u.pin_code1,u.address2,u.country2,u.state2,u.city2,u.pin_code2,
		r.role_name,u.id_department AS department";
		$this->db->select($fields);
		$this->db->from(TBL_USERS.' u');
		$this->db->join(TBL_ROLES.' r','u.id_role = r.id_role','left');
		$this->db->join(TBL_DEPARTMENT.' d','u.id_department = d.id_department','left');
		$this->db->join(TBL_LOCATION.' coo','u.country1 = coo.id','left');
		$this->db->join(TBL_LOCATION.' sto','u.state1 = sto.id','left');
		$this->db->join(TBL_LOCATION.' cio','u.city1 = cio.id','left');
		$where = array('id_user' => $postVal['id_user']);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function createEmpLogin($postVal=array()){
		$empRow = $this->getEmpDetails(array("id_user"=>$postVal['id_user']));
		$data = array("id_user"=>$empRow['id_user'],
			"username"=>$empRow['email'],
			"password"=>md5($postVal['password']),
			"created_at"=>getCurrentDateTime());
		if($this->db->insert(TBL_LOGIN,$data)){
			return array('status' => STATUS_SUCCESS, 'msg' => 'Employee login created successfully');
		}
		return array('status' => STATUS_FAIL, 'msg' => 'Please try again');
	}
	/*Add & Update Company Code Employee Mapping*/
	function updateCompCodeEmpMap($postVal=array()){
		$this->db->delete(TBL_USERS_COMPANY_CODE_MAPPING,array('id_user' => $postVal['id_user']));
		$data = array();
		if(!empty($postVal['id_company_code'])) {
			foreach ($postVal['id_company_code'] AS $v) {
				$data[] = array('id_user' => $postVal['id_user'], 'id_company_code' => $v);
			}
			if ($this->db->insert_batch(TBL_USERS_COMPANY_CODE_MAPPING, $data)) {
				return array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
			}
			return array('status' => STATUS_FAIL, 'msg' => 'Please try again');
		}else{
			return array('status' => STATUS_FAIL, 'msg' => 'Please select company code.');
		}
	}
//End
}
?>
