<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 6/9/19
 * Time: 2:02 PM
 */
class Master_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addMasterData($postVal=array()){
		$data = array('master_code'=>$postVal['master_code'],'name'=>$postVal['name']);
		if($this->db->insert(TBL_MASTER_DATA,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Data added successfully!');
		}else{
			return array('status'=>STATUS_FAIL,'msg'=>PLEASE_TRY_AGAIN);
		}
	}

	function updateMasterData($postVal=array()){
		$data = array('name'=>$postVal['name'],'is_active'=>$postVal['is_active']);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_MASTER_DATA,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Data added successfully!');
		}else{
			return array('status'=>STATUS_FAIL,'msg'=>PLEASE_TRY_AGAIN);
		}
	}

	function getMasterData($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MASTER_DATA.' m');
		$this->db->where(array('m.master_code'=>$postVal['master_code']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function getMasterDataDetails($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MASTER_DATA.' m');
		$this->db->where(array('m.id'=>$postVal['id_master_data']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

//End
}
?>
