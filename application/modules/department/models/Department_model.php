<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:25 PM
 */
class Department_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}
	function addDepartment($postVal=array()){
		$data = array(
			'dept_code'	        => $postVal['dept_short_name'],
			'name'				=> $postVal['name'],
			'modified_at'		=> getCurrentDateTime(),
			'modified_by'		=> $postVal['action_by'],
			'status'            => 1
			
		);
		if($this->db->insert(TBL_DEPARTMENT,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Department Added Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Department Not Added.');

	}
	/*Get company details based on Department Code*/
	function getDepartmentDetailsBsdnCode($postVal=array()){
		$result = array();
		$fields = "d.dept_code, d.name";
		$this->db->select($fields);
		$this->db->from(TBL_DEPARTMENT.' d');
		$this->db->where("LOWER(TRIM(d.dept_code))",strtolower($postVal['dept_short_name']));
		if(isset($postVal['id_department']) && $postVal['id_department'] > 0){
			$this->db->where_not_in('d.id_department',$postVal['id_department']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	function getDepartmentList($postVal = array()){
		if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
			$result = 0;
		}else{
			$result = array();
		}
		$fields = "d.*";
		$this->db->select($fields);
		$this->db->from(TBL_DEPARTMENT.' d');
		$where = array('d.status >'=>0);
        if(!empty($postVal)){
			if(isset($postVal['dept_code']) && strlen(trim($postVal['dept_code'])) > 0){
				$where['d.dept_code'] = trim($postVal['dept_code']);
			}
			if(isset($postVal['name']) && strlen(trim($postVal['name'])) > 0){
				$this->db->like('d.name',trim($postVal['name']),'both');
			}
		}
		if(!empty($where)){
			$this->db->where($where);
		}
		$this->db->order_by("d.id_department","DESC");
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
	function updateDepartment($postVal = array()){
		$data = array(
			'dept_code'	        => $postVal['dept_short_name'],
			'name'				=> $postVal['name']
		);
		$this->db->where('id_department', $postVal['id_department']);
		if($this->db->update(TBL_DEPARTMENT, $data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Department updated Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Failed to update');
	}
	function getDepartmentView($postVal = array()){
		$result = array();
		$fields = "d.*";
		$this->db->select($fields);
		$this->db->from(TBL_DEPARTMENT.' d');
		$where = array('id_department' => $postVal['id_department']);
		$this->db->where($where);
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->row_array();
		}
		return $result;
	}

	function getDepartmentKeyValue($postVal=array()){
		$result = array();
		if(isset($postVal['ps'])){
			$result = array(''=>'Please Select');
		}
		$fields = "d.id_department,d.dept_code,d.name";
		$this->db->select($fields);
		$this->db->from(TBL_DEPARTMENT.' d');
		$this->db->where(array('d.status'=>1));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id_department']] = $val['dept_code'].' - '.$val['name'];
			}
		}
		return $result;
	}
//End
}
?>
