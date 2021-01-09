<?php
class Csclmng_model extends MY_Model{
	function __construct(){
		parent::__construct();
	}

	function addCscl($postVal=array()){
		$data = array('id_parent' => $postVal['id_parent'],'name' => $postVal['name'],'country_level'=>$postVal['country_level']);
		if($this->db->insert(TBL_LOCATION,$data)){
			array('status' => STATUS_SUCCESS, 'msg' => 'Data added successfully!');
		}
		array('status' => STATUS_FAIL, 'msg' => 'Please try again!');
	}

	function getCsc($postVal = array()){
		$result = array();
		$fields = "csc.*";
		$this->db->select($fields);
		$this->db->from(TBL_LOCATION.' csc');
		$where = array();
		if(isset($postVal['id_parent']) && $postVal['id_parent'] > 0){
			$where['csc.id_parent'] = $postVal['id_parent'];
		}
		if(isset($postVal['country_level']) && $postVal['country_level'] > 0){
			$where['csc.country_level'] = $postVal['country_level'];
		}
		$this->db->where($where);
		$q = $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->result_array();
		}
		return $result;
	}
//End
}
?>
