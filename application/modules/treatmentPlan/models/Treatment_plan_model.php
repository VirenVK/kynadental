<?php
/**
 * Created by
 * User: Radhika
 */
class Treatment_plan_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
    }
    
    function getTreatmentGroups($officeId)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('trtmnt_groups');
		$this->db->where('officeid', $officeId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result();
		}
		return $result;
		// $result = array();

		// $t1 = 'trtmnt_groups';
		// $t2 = 'trtmnt_code_groups';
		// $t3 = 'cdt_codes';
		// $get = [
		// 	$t1.'.officeid',
		// 	$t1.'.trtmnt_groupsdetails',
		// 	$t1.'.idtrtmnt_groups',
		// 	$t2.'.cdtid',
		// 	// $t3.'.cdt_codes',
		// 	// $t3.'GROUP_CONCAT(cdt_codes SEPARATOR ", ") as cdt_codes',
		// 	"GROUP_CONCAT("+$t3+".cdt_codes SEPARATOR ',') AS cdt_codes"
		// ];
		// $this->db->select($get);
		// $this->db->from($t1);
		// $this->db->join($t2, $t1.'.idtrtmnt_groups = ' . $t2.'.treatment_groupsid', 'left');
		// $this->db->join($t3, $t2.'.cdtid = ' . $t3.'.cdtid', 'left');
		// $this->db->where($t1.'.officeid', $officeId);
		// $result = $this->db->get()->result();

		// return $result;
	}

	function getCdtCodesByTrtmtGroupId($treatmentGroupIds, $officeId, $remainingTrtmntGrpId){
		// $result = array();
		$cdtCodeArr = [];
		$remainingCdtCodeArr = [];
		

		if(count($treatmentGroupIds) > 0){
			foreach ($treatmentGroupIds as $key => $id) {
				$this->db->select('tcg.treatment_groupsid, tcg.cdtid, cdt.cdt_codes');
				$this->db->from('trtmnt_code_groups'.' tcg');
				$this->db->join('cdt_codes'.' cdt','tcg.cdtid = cdt.cdtid','left');
				$this->db->where(array('tcg.treatment_groupsid' => $id, 'tcg.officeid' => $officeId));
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$result = $query->result();
					foreach ($result as $k => $v) {
						array_push($cdtCodeArr, $v);
					}
				}
				
			}
		}
		if(count($remainingTrtmntGrpId) > 0){
			foreach ($remainingTrtmntGrpId as $key => $id) {
				$this->db->select('tcg.treatment_groupsid, tcg.cdtid, cdt.cdt_codes');
				$this->db->from('trtmnt_code_groups'.' tcg');
				$this->db->join('cdt_codes'.' cdt','tcg.cdtid = cdt.cdtid','left');
				$this->db->where(array('tcg.treatment_groupsid' => $id, 'tcg.officeid' => $officeId));
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$result = $query->result();
					foreach ($result as $k => $v) {
						array_push($remainingCdtCodeArr, $v);
					}
				}
				
			}
		}
		return ["checkedTrtmntGrp" => $cdtCodeArr, "uncheckedTrtmntGrp" => $remainingCdtCodeArr];	
	}

	 function getCdtCodes($officeId=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('cdt_codes');
		// $this->db->where('officeid', $officeId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result();
		}
		return $result;
	}
	 function getDentist()
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('credentials_dentist');
		// $this->db->where('officeid', $officeId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result();
		}
		return $result;
	}

	function addPatientTrtmntPlan($postVal=array())
	{
		if (count($postVal['checkedTrtmntGrpCdtCode'])>0) {
			$data=array();
			// delete
			$this->db->where(array('officeid'=>$postVal['officeid'],'patientid'=>$postVal['patientid']));
			$this->db->delete('trtmnt_patientcdtcode');

			foreach ($postVal['checkedTrtmntGrpCdtCode'] as $key => $value) {
				$post['officeid']=$postVal['officeid'];
				$post['patientid']=$postVal['patientid'];
				$post['cdtid']=$postVal['checkedTrtmntGrpCdtCode'][$key];
				$check = $this->checkTrtmntPatientCdtcode($post);
				
				if (count($check) == 0) {

					$data[]=array(
					'officeid'=>$postVal['officeid'],
					'patientid'=>$postVal['patientid'],
					'cdtid'=>$postVal['checkedTrtmntGrpCdtCode'][$key],
					'userid'=>$postVal['id_user'],
					'tooth'=>$postVal['tooth'],
					'iddentist'=>$postVal['iddentist'],
					'updatedby'=>$postVal['iddentist'],
					'updatedon'=>getCurrentDateTime(),
					);
				}
			}
			if (count($data)>0) {
				$this->db->insert_batch('trtmnt_patientcdtcode', $data);
				// PROCEDURE
				try {
					$result = array();
						$sql = "CALL trtmnt_plan(?,?,?)";
						$query = $this->db->query($sql,array($postVal['officeid'],$postVal['patientid'],$postVal['id_user']));
						$result = $query->result_array();
						$query->next_result();
					// if (count($data)==1) {
						
					// }

					return array('status' => STATUS_SUCCESS, 'msg' => isset($result)?json_encode($result):'Added successfully');
				}
				//catch exception
				catch(Exception $e) {
				  	return array('status' => STATUS_FAIL, 'msg' => 'Cdt Code is already exists');
				}
				
			}else{
				return array('status' => STATUS_FAIL, 'msg' => 'Cdt Code is already exists');
			}
			
		}
		return array('status' => STATUS_FAIL, 'msg' => 'Something went wrong!');
	}


	function allPatientTrtmntPlanList($postVal=array())
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('trtmnt_plan_header');
		$this->db->where(array('officeid'=>$postVal['officeid'],'patientid'=>$postVal['patientid']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function HeaderTreatmentPlanDetails($postVal=array())
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('trtmnt_plan_header');
		$this->db->where(array('idtrtmnt_plan_hdr'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function allTreatmentPlanDetails($postVal=array())
	{
		$result = array();
		$this->db->select('t.*,c.cdt_codes');
		$this->db->from('trtmnt_plan_detail'.' t');
		$this->db->join('cdt_codes'.' c','t.cdtid=c.cdtid','left');
		$this->db->where(array('t.officeid'=>$postVal['officeid'],'t.patientid'=>$postVal['patientid'],'t.idtrtmnt_plan_hdr'=>$postVal['id']));
		$this->db->order_by('t.cdtid','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function checkTrtmntPatientCdtcode($postVal=array())
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('trtmnt_patientcdtcode');
		$this->db->where(array('officeid'=>$postVal['officeid'],'patientid'=>$postVal['patientid'],'cdtid'=>$postVal['cdtid']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function deletePatientTrtmntPlan($postVal=array())
	{
		$this->db->where('idtrtmnt_plan_hdr',$postVal['id']);
		$this->db->delete('trtmnt_plan_header');

		$this->db->where('idtrtmnt_plan_hdr',$postVal['id']);
		$this->db->delete('trtmnt_plan_detail');

		return array('status' => STATUS_SUCCESS, 'msg' =>'Deleted successfully');
	}

//End
}
?>
