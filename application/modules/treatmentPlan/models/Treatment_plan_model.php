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
//End
}
?>
