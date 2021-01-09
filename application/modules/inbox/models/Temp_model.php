<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:25 PM
 */
class Temp_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getListP($postVal=array()){
		/*Your Query*/
		$where = array();
		if(!empty($postVal)){
			if(isset($postVal['comp_code']) && strlen(trim($postVal['comp_code'])) > 0){
				$where['c.comp_short_name'] = trim($postVal['comp_code']);
			}
			if(isset($postVal['comp_name']) && strlen(trim($postVal['comp_name'])) > 0){
				$this->db->like('c.name',trim($postVal['comp_name']),'both');
			}
		}
		if(!empty($where)){
			$this->db->where($where);
		}
		$this->db->order_by("FIELD_NAME","DESC");
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
//End
}
?>
