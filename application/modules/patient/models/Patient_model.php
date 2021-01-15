<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 24/7/19
 * Time: 6:08 PM
 */
class Patient_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function allpatient($postVal = array()){
		if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
			$result = 0;
		}else{
			$result = array();
		}
		$fields = "p.*,o.*";
		$this->db->select($fields);
		$this->db->from('patients'.' p');
		$this->db->join('officename'.' o','p.officeid = o.officeid','left');
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
		// if(!empty($where)){
		// 	$this->db->where($where);
		// }
		$this->db->order_by('p.patientid','desc');
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

	function patientdetails($id=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('patients'.' p');
		$where = array('p.patientid' => $id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function patientInsurance($id=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('patient_insurance'.' p');
		$where = array('p.patientid' => $id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	// function patientothersdetails($id)
	// {
	// 	$result = array();
	// 	$this->db->select('*');
	// 	$this->db->from('patients_others_details'.' p');
	// 	$where = array('p.patientid' => $id);
	// 	$this->db->where($where);
	// 	$query = $this->db->get();
	// 	if($query->num_rows() > 0){
	// 		$result = $query->row_array();
	// 	}
	// 	return $result;
	// }

	function getCdtCodes()
	{
		$result = array();
		$this->db->select('c.*');
		$this->db->from('cdt_codes'.' c');
		$this->db->where(array('c.cdtgroups !='=>''));
		$this->db->order_by('c.cdtgroups','asc');
		$this->db->group_by('c.cdtgroups');
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result=$query->result_array();
		}
		return $result;
	}

	// function updatePatientDetails($postVal=array())
	// {	
	// 	$patient=array(
	// 		'p_firstname'=>isset($postVal['p_firstname'])?$postVal['p_firstname']:'',
	// 		'p_lastname'=>isset($postVal['p_lastname'])?$postVal['p_lastname']:'',
	// 		'p_dob'=>isset($postVal['p_dob'])?$postVal['p_dob']:'',
	// 		's_firstname'=>isset($postVal['s_firstname'])?$postVal['s_firstname']:'',
	// 		's_lastname'=>isset($postVal['s_lastname'])?$postVal['s_lastname']:'',
	// 		's_dob'=>isset($postVal['s_dob'])?$postVal['s_dob']:'',
	// 	);
	// 	$this->db->where('patientid',$postVal['patientid']);
	// 	if ($this->db->update('patients',$patient)) {
	// 		echo true;
	// 	}
		
	// 	$insurance=array(
	// 		'insurance_id'=>isset($postVal['insurance_id'])?$postVal['insurance_id']:'',
	// 		'plansid'=>isset($postVal['plansid'])?$postVal['plansid']:'',
	// 		'employerid'=>isset($postVal['employerid'])?$postVal['employerid']:'',
	// 		'memberid'=>isset($postVal['memberid'])?$postVal['memberid']:'',
	// 		'ins_benefit_remaining'=>isset($postVal['ins_benefit_remaining'])?$postVal['ins_benefit_remaining']:'',
	// 		'ind_ded_remaining'=>isset($postVal['individual_deductions'])?$postVal['individual_deductions']:'',
	// 		'family_ded_remaining'=>isset($postVal['family_deduction'])?$postVal['family_deduction']:'',
	// 		'effective_date'=>isset($postVal['effective_date'])?$postVal['effective_date']:'',
	// 		'benefit_maximum'=>isset($postVal['benefit_maximum'])?$postVal['benefit_maximum']:'',
	// 		'benefit_remaining'=>isset($postVal['benefit_remaining'])?$postVal['benefit_remaining']:'',
	// 		'individual_remaining'=>isset($postVal['individual_remaining'])?$postVal['individual_remaining']:'',
	// 		'family_remaining'=>isset($postVal['family_remaining'])?$postVal['family_remaining']:''
	// 	);

	// 	$this->db->where('patientid',$postVal['patientid']);
	// 	if ($this->db->update('patient_insurance',$insurance)) {
	// 		echo true;
	// 	}	

	// 	$others=array(
	// 		'applies_preventive'	=>isset($postVal['applies_preventive'])?$postVal['applies_preventive']:'',
	// 		'applies_diagnostics'	=>isset($postVal['applies_diagnostics'])?$postVal['applies_diagnostics']:'',
	// 		'applies_basic'			=>isset($postVal['applies_basic'])?$postVal['applies_basic']:'',
	// 		'applies_major'			=>isset($postVal['applies_major'])?$postVal['applies_major']:'',
	// 		'applies_endodontic'	=>isset($postVal['applies_endodontic'])?$postVal['applies_endodontic']:'',
	// 		'applies_periodontics'	=>isset($postVal['applies_periodontics'])?$postVal['applies_periodontics']:'',
	// 		'missing_tooth_clause'	=>isset($postVal['missing_tooth_clause'])?$postVal['missing_tooth_clause']:'',
	// 		'predetermination_needed'=>isset($postVal['predetermination_needed'])?$postVal['predetermination_needed']:'',
	// 		'predetermination_rec'	=>isset($postVal['predetermination_rec'])?$postVal['predetermination_rec']:'',
	// 		'fmx_pano'				=>isset($postVal['fmx_pano'])?$postVal['fmx_pano']:'',
	// 		'srp'					=>isset($postVal['srp'])?$postVal['srp']:'',
	// 		'exam'					=>isset($postVal['exam'])?$postVal['exam']:'',
	// 		'prophy'				=>isset($postVal['prophy'])?$postVal['prophy']:'',
	// 		'fillings'				=>isset($postVal['fillings'])?$postVal['fillings']:'',
	// 		'crown'					=>isset($postVal['crown'])?$postVal['crown']:'',
	// 		'preventive'			=>isset($postVal['preventive'])?$postVal['preventive']:'',
	// 		'diagnostics'			=>isset($postVal['diagnostics'])?$postVal['diagnostics']:'',
	// 		'basic'					=>isset($postVal['basic'])?$postVal['basic']:'',
	// 		'major'					=>isset($postVal['major'])?$postVal['major']:'',
	// 		'restorative'			=>isset($postVal['restorative'])?$postVal['restorative']:'',
	// 		'orthodontics'			=>isset($postVal['orthodontics'])?$postVal['orthodontics']:'',
	// 		'periodontics'			=>isset($postVal['periodontics'])?$postVal['periodontics']:'',
	// 		'endodontics'			=>isset($postVal['endodontics'])?$postVal['endodontics']:'',
	// 		'allowed_frequency'		=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:'',
	// 		'age_up_to'				=>isset($postVal['age_up_to'])?$postVal['age_up_to']:'',
	// 		'user_age'				=>isset($postVal['user_age'])?$postVal['user_age']:'',
	// 		'user_month'			=>isset($postVal['user_month'])?$postVal['user_month']:'',
	// 		'user_month_type'		=>isset($postVal['user_month_type'])?$postVal['user_month_type']:'',
	// 		'user_per'				=>isset($postVal['user_per'])?$postVal['user_per']:'',
	// 		'age_up_to_2'			=>isset($postVal['age_up_to_2'])?$postVal['age_up_to_2']:'',
	// 		'user_age_2'			=>isset($postVal['user_age_2'])?$postVal['user_age_2']:'',
	// 		'user_month_2'			=>isset($postVal['user_month_2'])?$postVal['user_month_2']:'',
	// 		'user_month_type_2'		=>isset($postVal['user_month_type_2'])?$postVal['user_month_type_2']:'',
	// 		'user_per_2'			=>isset($postVal['user_per_2'])?$postVal['user_per_2']:'',
	// 		'lifetime_max'			=>isset($postVal['lifetime_max'])?$postVal['lifetime_max']:'',
	// 		'age_limit'				=>isset($postVal['age_limit'])?$postVal['age_limit']:'',
	// 		'deduction_applies'		=>isset($postVal['deduction_applies'])?$postVal['deduction_applies']:'',
	// 		'crown_payment'			=>isset($postVal['crown_payment'])?$postVal['crown_payment']:'',
	// 		'orthodontics_payment'	=>isset($postVal['orthodontics_payment'])?$postVal['orthodontics_payment']:'',
	// 		'shares_freq_limit_exam'=>isset($postVal['shares_freq_limit_exam'])?$postVal['shares_freq_limit_exam']:'',
	// 		'shares_freq_perio_maint'=>isset($postVal['shares_freq_perio_maint'])?$postVal['shares_freq_perio_maint']:'',
	// 		'verified_by'			=>isset($postVal['verified_by'])?$postVal['verified_by']:'',
	// 		'verified_by_2'			=>isset($postVal['verified_by_2'])?$postVal['verified_by_2']:''
	// 	);

	// 	$this->db->where('patientid',$postVal['patientid']);
	// 	if ($this->db->update('patients_others_details',$others)) {
	// 		echo true;
	// 	}	

	// 	if (isset($postVal['cdt_codes_id']) && count($postVal['cdt_codes_id'])) {
	// 		foreach ($postVal['cdt_codes_id'] as $key => $value) {
	// 			if ($postVal['cdt_codes_id'][$key]>0) {
	// 				$data=array(
	// 					'patientid'=>$postVal['patientid'],
	// 					'cdtid'=>$postVal['cdt_codes_id'][$key],
	// 					'description'=>$postVal['description'][$key],
	// 					'procedure_level'=>$postVal['procedure_level'][$key],
	// 					'allowed_frequency'=>$postVal['code_allowed_frequency'][$key],
	// 					'allowed_frequency_months'=>$postVal['allowed_frequency_months'][$key],
	// 					'coverage_percentage'=>$postVal['coverage_percentage'][$key],
	// 					'waiting'=>$postVal['waiting'][$key]
	// 				);
	// 			}
	// 		}
	// 	}
	// 	return array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully');

	// }
//End
}
?>
