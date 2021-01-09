<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 22/7/19
 * Time: 11:29 AM
 */
class MY_Model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function wrJsonFile($postVal=array()){
		return $this->common_model->writeJsonFile($postVal);
	}

	function rdJsonFile($postVal=array()){
		return $this->common_model->readJsonFile($postVal);
	}

	function getDocumentNumber($postVal=array()){
		$new_number = 0;
		$fields = "d.id_doc_num,d.num_prefix,d.doc_num";
		$this->db->select($fields);
		$this->db->from(TBL_DOCUMENT_NUMBER.' d');
		$this->db->where(array('d.is_active'=>1,'d.doc_code'=>$postVal['doc_code']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$number = $row['doc_num'] + 1;
			$new_number = trim($row['num_prefix']).date('y').$number;
			$d = array('doc_num'=>$number);
			$this->db->where('id_doc_num',$row['id_doc_num']);
			$this->db->update(TBL_DOCUMENT_NUMBER,$d);
		}
		return $new_number;
	}
//End
}
?>
