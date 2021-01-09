<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 5/7/19
 * Time: 5:40 PM
 */
class Dashboard_model extends MY_Model{
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
		$fields = "p.*,o.*,i.plansid";
		$this->db->select($fields);
		$this->db->from('patients'.' p');
		$this->db->join('officename'.' o','p.officeid = o.officeid','left');
		$this->db->join('patient_insurance'.' i','p.patientid =i.patientid','left');
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
		$this->db->where('p.officeid',$postVal['officeId']);
		$this->db->where('p.dataentry',null);
		if(!empty($where)){
			$this->db->where($where);
		}
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
	function allpatientDataentry($postVal = array()){
		if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
			$result = 0;
		}else{
			$result = array();
		}
		$fields = "p.*,o.*,i.plansid";
		$this->db->select($fields);
		$this->db->from('patients'.' p');
		$this->db->join('officename'.' o','p.officeid = o.officeid','left');
		$this->db->join('patient_insurance'.' i','p.patientid =i.patientid','left');
		if(!empty($postVal)){
			if(isset($postVal['f_name']) && strlen(trim($postVal['f_name'])) > 0){
				$this->db->like('p.p_firstname',trim($postVal['f_name']),'both');
			}
			if(isset($postVal['l_name']) && strlen(trim($postVal['l_name'])) > 0){
				$this->db->like('p.p_lastname',trim($postVal['l_name']),'both');
			}
			if(isset($postVal['dob']) && strlen(trim($postVal['dob'])) > 0){
				$this->db->where('p.p_dob',getDateYmd(trim($postVal['dob'])));
			}
		}
		$this->db->where('p.officeid',$postVal['officeId']);
		$this->db->where('dataentry',1);
		if(!empty($where)){
			$this->db->where($where);
		}
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

	function office($postVal=array()){
		$result = array();
		$this->db->select('*');
		$this->db->from('officename'.' o');
		$this->db->join('roles_assignment'.' a','o.officeid=a.officeid','left');
		$this->db->where('userid',$postVal['userid']);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function Plans($id=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('insurance_plans');
		$this->db->where('insurance_plans_id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function insurancePlans($id=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('insurance_plans_cdt_codes'.' p');
		$this->db->join('cdt_codes'.' c','p.cdtid=c.cdtid','left');
		$this->db->where('p.insurance_plans_id',$id);
		$this->db->order_by('p.cdtid','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $key => $value) {
				$result[$value['cdtid']] = $value;
			}
			
		}
		return $result;
	}

	function updatePatientDetailsPlan($postVal=array())
	{	
		$patient=array(
			'p_firstname'=>isset($postVal['p_firstname'])?$postVal['p_firstname']:'',
			'p_lastname'=>isset($postVal['p_lastname'])?$postVal['p_lastname']:'',
			'p_dob'=>getDateYmd(isset($postVal['p_dob'])?$postVal['p_dob']:''),
			'dataentry'=>1,
			's_firstname'=>isset($postVal['s_firstname'])?$postVal['s_firstname']:'',
			's_lastname'=>isset($postVal['s_lastname'])?$postVal['s_lastname']:'',
			's_dob'=>getDateYmd(isset($postVal['s_dob'])?$postVal['s_dob']:''),
			'lastupdate'=>getCurrentDateTime(),
			'updatedby'=>$postVal['id_user'],
		);
		$this->db->where('patientid',$postVal['patientid']);
		$this->db->update('patients',$patient);

		$insurance=array(
			'officeid'=>$postVal['officeid'],
			'patientid'=>$postVal['patientid'],
			'plansid'=>$postVal['insurance_plans_id'],
			'employerid'=>isset($postVal['employerid'])?$postVal['employerid']:'',
			'memberid'=>isset($postVal['memberid'])?$postVal['memberid']:'',
			'ins_benefit_remaining'=>isset($postVal['ins_benefit_remaining'])?$postVal['ins_benefit_remaining']:'',
			'ind_ded_remaining'=>isset($postVal['ind_ded_remaining'])?$postVal['ind_ded_remaining']:'',
			'family_ded_remaining'=>isset($postVal['family_ded_remaining'])?$postVal['family_ded_remaining']:'',
			'effective_date'=>$postVal['effective_date'] !=''?getDateYmd($postVal['effective_date']):'',
			'verification_date'=>getCurrentDate(),
			'creation_date'=>getCurrentDate(),
			'createdby'=>$postVal['id_user'],
			'lastupdate'=>getCurrentDateTime(),
			'updatedby'=>$postVal['id_user'],
		);
		$insuranceCheck=$this->patientInsurance($postVal['patientid']);
		if (count($insuranceCheck)>0) {
			unset($insurance['verification_date']);
			unset($insurance['creation_date']);
			unset($insurance['createdby']);

			$this->db->where('patientid',$postVal['patientid']);
			$this->db->update('patient_insurance',$insurance);
		}else{
			unset($insurance['lastupdate']);
			unset($insurance['updatedby']);
			$this->db->insert('patient_insurance',$insurance);
		}

		// insurance_agent
		if (isset($postVal['insurance_agentname']) && $postVal['insurance_agentname'] !='') {
			$agent=array(
				'patientid'=>$postVal['patientid'],
				'insurance_agentname'=>$postVal['insurance_agentname'],
				'insurance_agentid'=>$postVal['insurance_agentid'],
				'createdby'=>$postVal['id_user'],
				'createdon'=>getCurrentDateTime(),
			);
			$this->db->insert('insurance_agent',$agent);
		}

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			$others=array(
				'ind_deductible_annual'	=>isset($postVal['ind_deductible_annual'])?$postVal['ind_deductible_annual']:'',
				'ind_limit_annual'	=>isset($postVal['ind_limit_annual'])?$postVal['ind_limit_annual']:'0',
				'family_deductible_annual'	=>isset($postVal['family_deductible_annual'])?$postVal['family_deductible_annual']:'',
				'family_limit_annual'	=>isset($postVal['family_limit_annual'])?$postVal['family_limit_annual']:'0',
				'ind_lifetime_limit'	=>isset($postVal['ind_lifetime_limit'])?$postVal['ind_lifetime_limit']:'0',
				'family_lifetime_limit'	=>isset($postVal['family_lifetime_limit'])?$postVal['family_lifetime_limit']:'0',
				'missing_tooth_clause'	=>isset($postVal['missing_tooth_clause'])?$postVal['missing_tooth_clause']:'0',
				'predetermination_needed'=>isset($postVal['predetermination_needed'])?$postVal['predetermination_needed']:'0',
				// 'predetermination_rec'	=>isset($postVal['predetermination_rec'])?$postVal['predetermination_rec']:'',
				'insurance_benefits'	=>isset($postVal['insurance_benefits'])?$postVal['insurance_benefits']:'',
				'preventive_deduction_applies'=>isset($postVal['preventive_deduction_applies'])?$postVal['preventive_deduction_applies']:'N',
				'diagnostic_deduction_applies'=>isset($postVal['diagnostic_deduction_applies'])?$postVal['diagnostic_deduction_applies']:'N',
				'restorative_deduction_applies'=>isset($postVal['restorative_deduction_applies'])?$postVal['restorative_deduction_applies']:'N',
				'endodontic_deduction_applies'=>isset($postVal['endodontic_deduction_applies'])?$postVal['endodontic_deduction_applies']:'N',
				'periodontics_deduction_applies'=>isset($postVal['periodontics_deduction_applies'])?$postVal['periodontics_deduction_applies']:'N',
				'prosthodonticsremovable_ded_applies'=>isset($postVal['prosthodonticsremovable_ded_applies'])?$postVal['prosthodonticsremovable_ded_applies']:'N',
				'maxillofacialprosthetics_ded_applies'=>isset($postVal['maxillofacialprosthetics_ded_applies'])?$postVal['maxillofacialprosthetics_ded_applies']:'N',
				'implants_ded_applies'=>isset($postVal['implants_ded_applies'])?$postVal['implants_ded_applies']:'N',
				'prosthodontics_fixed_ded_applies'=>isset($postVal['prosthodontics_fixed_ded_applies'])?$postVal['prosthodontics_fixed_ded_applies']:'N',
				'oralsurgery_ded_applies'=>isset($postVal['oralsurgery_ded_applies'])?$postVal['oralsurgery_ded_applies']:'N',
				'orthodontics_deduction_applies'=>isset($postVal['orthodontics_deduction_applies'])?$postVal['orthodontics_deduction_applies']:'N',
				'adjunctivegenservices_ded_applies'=>isset($postVal['adjunctivegenservices_ded_applies'])?$postVal['adjunctivegenservices_ded_applies']:'N',
				'preventive_percentage'	=>isset($postVal['preventive_percentage'])?$postVal['preventive_percentage']:'0',
				'diagnostics_percentage'=>isset($postVal['diagnostics_percentage'])?$postVal['diagnostics_percentage']:'0',
				'restorative_percentage'=>isset($postVal['restorative_percentage'])?$postVal['restorative_percentage']:'0',
				'endodontics_percentage'=>isset($postVal['endodontics_percentage'])?$postVal['endodontics_percentage']:'0',
				'periodontics_percentage'=>isset($postVal['periodontics_percentage'])?$postVal['periodontics_percentage']:'0',
				'prosthodonticsremovable_percentage' =>isset($postVal['prosthodonticsremovable_percentage'])?$postVal['prosthodonticsremovable_percentage']:'0',
				'maxillofacialprosthetics_percentage'=>isset($postVal['maxillofacialprosthetics_percentage'])?$postVal['maxillofacialprosthetics_percentage']:'0',
				'implants_percentage'=>isset($postVal['implants_percentage'])?$postVal['implants_percentage']:'0',
				'prosthodontics_fixed_percentage'=>isset($postVal['prosthodontics_fixed_percentage'])?$postVal['prosthodontics_fixed_percentage']:'0',
				'oralsurgery_percentage	'=>isset($postVal['oralsurgery_percentage'])?$postVal['oralsurgery_percentage']:'0',
				'orthodontics_percentage'=>isset($postVal['orthodontics_percentage'])?$postVal['orthodontics_percentage']:'0',
				'adjunctivegenservices_percentage'=>isset($postVal['adjunctivegenservices_percentage'])?$postVal['adjunctivegenservices_percentage']:'0',
				'allowed_frequency'	=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:'1',
				'orthodontics_lifetime_max'	=>isset($postVal['orthodontics_lifetime_max'])?$postVal['orthodontics_lifetime_max']:'',
				'orthodontics_agelimit'	=>isset($postVal['orthodontics_agelimit'])?$postVal['orthodontics_agelimit']:'',
				'crown_payment'			=>isset($postVal['crown_payment'])?$postVal['crown_payment']:'',
				'orthodontics_payment'	=>isset($postVal['orthodontics_payment'])?$postVal['orthodontics_payment']:'',
				'filling_downgrades'	=>isset($postVal['filling_downgrades'])?$postVal['filling_downgrades']:'',
				'crown_molar_downgrades'=>isset($postVal['crown_downgrades'])?$postVal['crown_downgrades']:'',
				'crown_premolar_downgrades'=>isset($postVal['crown_premolar_downgrades'])?$postVal['crown_premolar_downgrades']:'',
				'preventive_waitingperiod'=>isset($postVal['preventive_waitingperiod'])?$postVal['preventive_waitingperiod']:'',
				'diagnostic_waitingperiod'=>isset($postVal['diagnostic_waitingperiod'])?$postVal['diagnostic_waitingperiod']:'',
				'restorative_waitingperiod'=>isset($postVal['restorative_waitingperiod'])?$postVal['restorative_waitingperiod']:'',
				'endodontics_waitingperiod'=>isset($postVal['endodontics_waitingperiod'])?$postVal['endodontics_waitingperiod']:'',
				'periodontics_waitingperiod'=>isset($postVal['periodontics_waitingperiod'])?$postVal['periodontics_waitingperiod']:'',
				'prosthodonticsremovable_waitingperiod'=>isset($postVal['prosthodonticsremovable_waitingperiod'])?$postVal['prosthodonticsremovable_waitingperiod']:'',
				'maxillofacialprosthetics_waitingperiod'=>isset($postVal['maxillofacialprosthetics_waitingperiod'])?$postVal['maxillofacialprosthetics_waitingperiod']:'',
				'implant_waitingperiod'=>isset($postVal['implant_waitingperiod'])?$postVal['implant_waitingperiod']:'',
				'prosthodontics_fixed_waitingperiod'=>isset($postVal['prosthodontics_fixed_waitingperiod'])?$postVal['prosthodontics_fixed_waitingperiod']:'',
				'oralsurgery_waitingperiod'=>isset($postVal['oralsurgery_waitingperiod'])?$postVal['oralsurgery_waitingperiod']:'',
				'orthodontics_waitingperiod'=>isset($postVal['orthodontics_waitingperiod'])?$postVal['orthodontics_waitingperiod']:'',
				'adjunctivegenservices_waitingperiod'=>isset($postVal['adjunctivegenservices_waitingperiod'])?$postVal['adjunctivegenservices_waitingperiod']:'',
				'updatedby'=>$postVal['id_user'],
				'updatedon'=>getCurrentDateTime(),
			);
			$this->db->where('insurance_plans_id',$postVal['insurance_plans_id']);
			$this->db->update('insurance_plans',$others);
		}

		//printData($postVal);
		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['cdtgroups'])) {
				$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
				for ($i=0; $i < count($postVal['cdtgroups']) ; $i++) { 
					$result=$this->getCdtCodesSerach(trim($postVal['cdtgroups'][$i]));
					foreach ($result as $row) {
						$checkPlan= $this->singlePlans($plansid,$row['cdtid']);
						if (count($checkPlan)>0 ) {
							$data=array(
							'procedure_level'=>$postVal['procedure_level'][$i],
							'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$i],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage'][$i],
							'waiting'=>$postVal['waiting'][$i],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							);
							$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$row['cdtid']));
							$this->db->update('insurance_plans_cdt_codes',$data);
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$row['cdtid'],
							'procedure_level'=>$postVal['procedure_level'][$i],
							'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$i],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage'][$i],
							'waiting'=>$postVal['waiting'][$i],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}
		// if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
		// 	if (isset($postVal['cdt_codes_id']) && count($postVal['cdt_codes_id'])>0) {
		// 		foreach ($postVal['cdt_codes_id'] as $key => $row) {
		// 			$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
		// 			if (isset($postVal['cdt_codes_id'][$key]) && $postVal['cdt_codes_id'][$key]>0 && $postVal['code_allowed_frequency_plan'][$key] !='') {
		// 				$checkPlan= $this->singlePlans($plansid,$postVal['cdt_codes_id'][$key]);
		// 				if (count($checkPlan)>0 ) {
		// 					$data=array(
		// 					'insurance_plans_id'=>$plansid,
		// 					'cdtid'=>$postVal['cdt_codes_id'][$key],
		// 					'procedure_level'=>$postVal['procedure_level'][$key],
		// 					'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$key],
		// 					'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
		// 					'coverage_percentage'=>$postVal['coverage_percentage'][$key],
		// 					'waiting'=>$postVal['waiting'][$key],
		// 					'updatedby'=>$postVal['id_user'],
		// 					'updatedon'=>getCurrentDateTime(),
		// 					);
		// 					$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['cdt_codes_id'][$key]));
		// 					$this->db->update('insurance_plans_cdt_codes',$data);
		// 				}else{
		// 					$data=array(
		// 					'insurance_plans_id'=>$plansid,
		// 					'cdtid'=>$postVal['cdt_codes_id'][$key],
		// 					'procedure_level'=>$postVal['procedure_level'][$key],
		// 					'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$key],
		// 					'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
		// 					'coverage_percentage'=>$postVal['coverage_percentage'][$key],
		// 					'waiting'=>$postVal['waiting'][$key],
		// 					'updatedby'=>$postVal['id_user'],
		// 					'updatedon'=>getCurrentDateTime(),
		// 					);
		// 					$this->db->insert('insurance_plans_cdt_codes',$data);
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['cdt_codes_id_single']) && count($postVal['cdt_codes_id_single'])) {
				foreach ($postVal['cdt_codes_id_single'] as $key => $row) {
					$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
					if (isset($postVal['cdt_codes_id_single'][$key]) && $postVal['cdt_codes_id_single'][$key]>0) {
						$checkPlan= $this->singlePlans($plansid,$postVal['cdt_codes_id_single'][$key]);
						if (count($checkPlan)>0) {
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['cdt_codes_id_single'][$key],
							'from_age'=>0,
							'to_age'=>$postVal['to_age_single'][$key],
							'allowed_frequency'=>$postVal['allowed_frequency_single'][$key],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage_single'][$key],
							'procedure_level'=>$postVal['procedure_level_single'][$key],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							// 'waiting'=>$postVal['waiting_single'][$key],
							);
							$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['cdt_codes_id_single'][$key]));
							$this->db->update('insurance_plans_cdt_codes',$data);
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['cdt_codes_id_single'][$key],
							'from_age'=>0,
							'to_age'=>$postVal['to_age_single'][$key],
							'allowed_frequency'=>$postVal['allowed_frequency_single'][$key],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage_single'][$key],
							'procedure_level'=>$postVal['procedure_level_single'][$key],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							// 'waiting'=>$postVal['waiting_single'][$key],
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['shares_cdtid']) && count($postVal['shares_cdtid'])) {
				foreach ($postVal['shares_cdtid'] as $key => $row) {
					$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
					if (isset($postVal['shares_cdtid'][$key]) && $postVal['shares_cdtid'][$key]>0) {
						$checkPlan= $this->singlePlans($plansid,$postVal['shares_cdtid'][$key]);
						if (count($checkPlan)>0) {
							$shares_freq_limit_exam=isset($postVal['shares_freq_limit_exam'])?$postVal['shares_freq_limit_exam']:0;
							$shares_freq_perio_maint=isset($postVal['shares_freq_perio_maint'])?$postVal['shares_freq_perio_maint']:0;
							if (isset($postVal['shares_freq_limit_exam']) && $postVal['shares_cdtid'][$key]==140) {
								$data=array(
								'insurance_plans_id'=>$plansid,
								'cdtid'=>$postVal['shares_cdtid'][$key],
								'shares_frequency'=>$shares_freq_limit_exam,
								'updatedby'=>$postVal['id_user'],
								'updatedon'=>getCurrentDateTime(),
								);
								$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['shares_cdtid'][$key]));
								$this->db->update('insurance_plans_cdt_codes',$data);
							}

							if (isset($postVal['shares_freq_perio_maint']) && $postVal['shares_cdtid'][$key]==4910) {
								$data=array(
								'insurance_plans_id'=>$plansid,
								'cdtid'=>$postVal['shares_cdtid'][$key],
								'shares_frequency'=>$shares_freq_perio_maint,
								'updatedby'=>$postVal['id_user'],
								'updatedon'=>getCurrentDateTime(),
								);
								$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['shares_cdtid'][$key]));
								$this->db->update('insurance_plans_cdt_codes',$data);
							}
							
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['shares_cdtid'][$key],
							'shares_frequency'=>isset($postVal['shares_freq_limit_exam'])?$postVal['shares_freq_limit_exam']:0,
							'shares_frequency'=>isset($postVal['shares_freq_perio_maint'])?$postVal['shares_freq_perio_maint']:0,
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}

		if (isset($postVal['history_field']) && count($postVal['history_field'])) {
			if (isset($postVal['historyId']) && count($postVal['historyId'])>0) {
				foreach ($postVal['historyId'] as $key => $hRow) {
					if ($postVal['history_field'][$key] > 0) {
						$hdata=array(
							'officeid'=>$postVal['officeid'],
							'patientid'=>$postVal['patientid'],
							'cdtid'=> $postVal['history_field'][$key],
							'history_field_date1'=>$postVal['history_field_date1'][$key] !=''?getDateYmd($postVal['history_field_date1'][$key]):'',
							'history_field_date2'=>$postVal['history_field_date2'][$key] !=''?getDateYmd($postVal['history_field_date2'][$key]):'',
							'history_field_date3'=>$postVal['history_field_date3'][$key] !=''?getDateYmd($postVal['history_field_date3'][$key]):'',
							'history_field_date4'=>$postVal['history_field_date4'][$key] !=''?getDateYmd($postVal['history_field_date4'][$key]):'',
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
						);

						$this->db->where(array('patientid'=>$postVal['patientid'],'cdtid'=>$postVal['history_field'][$key]));
						$this->db->update('patient_history',$hdata);
					}
				}
			}

			foreach ($postVal['history_field'] as $key => $hRow) {
				if ($postVal['history_field'][$key] >0 && $postVal['historyId'][$key]!=$postVal['history_field'][$key]) {
					$hdata=array(
						'officeid'=>$postVal['officeid'],
						'patientid'=>$postVal['patientid'],
						'cdtid'=> $postVal['history_field'][$key],
						'history_field_date1'=>$postVal['history_field_date1'][$key] !=''?getDateYmd($postVal['history_field_date1'][$key]):'',
						'history_field_date2'=>$postVal['history_field_date2'][$key] !=''?getDateYmd($postVal['history_field_date2'][$key]):'',
						'history_field_date3'=>$postVal['history_field_date3'][$key] !=''?getDateYmd($postVal['history_field_date3'][$key]):'',
						'history_field_date4'=>$postVal['history_field_date4'][$key] !=''?getDateYmd($postVal['history_field_date4'][$key]):'',
						'updatedby'=>$postVal['id_user'],
						'updatedon'=>getCurrentDateTime(),
					);
					
					$this->db->insert('patient_history',$hdata);
				}
			}

		}
		return array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully');
	}

	function singlePlans($plans_id=0,$id=0)
	{
		$result = array();
		$this->db->select('*,');
		$this->db->from('insurance_plans_cdt_codes');
		$this->db->where(array('insurance_plans_id'=>$plans_id,'cdtid'=>$id));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function PatientHistory($id=0)
	{
		$result = array();
		$this->db->select('*,');
		$this->db->from('patient_history');
		$this->db->where(array('patientid'=>$id));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function addInsurance($postVal=array())
	{
		$response=$this->getInsurancePlan($postVal);

		return array('status' => STATUS_SUCCESS, 'msg' => 'Added successfully','data'=>$response['plansid']);
	}

	function getInsurancePlan($postVal=array())
	{	
		$data=array();
		if (isset($postVal['insurance']) && $postVal['insurance'] == 'New') {
			$this->db->insert('insurance',array('insurancename'=>$postVal['insurance_new']));
			$last_id=$this->db->insert_id();
			$data['insurance_id']=$last_id;
		}else{
			$data['insurance_id']=$postVal['insurance'];
		}

		if (isset($postVal['employer']) && $postVal['employer'] == 'New') {
			$this->db->insert('employers',array('employersname'=>$postVal['employer_new']));
			$last_id=$this->db->insert_id();
			$data['employer_id']=$last_id;
		}else{
			$data['employer_id']=$postVal['employer'];
		}

		if (isset($postVal['plansid']) && $postVal['plansid'] == 'New') {
			$plan=$this->getPlans(array('insurance_id'=>$data['insurance_id'],'groupid'=>$postVal['plansid_new']));
			$postVal['plansid_new']=isset($plan['groupid'])?$plan['groupid']:$postVal['plansid_new'];
			$checkexits=$this->getInsurancePlans(array('insurance_id'=>$data['insurance_id'],'groupid'=>$postVal['plansid_new'],'productid'=>$postVal['product_id']));
			if (count($checkexits)>0) {
				$data['plansid']=isset($checkexits[0]['insurance_plans_id'])?$checkexits[0]['insurance_plans_id']:$postVal['plansid'];
			}else{
				$this->db->insert('insurance_plans',array('insurance_id'=>$data['insurance_id'],'employer_id'=>$data['employer_id'],'groupid'=>$postVal['plansid_new'],'productid'=>$postVal['product_id'],));
				$last_id=$this->db->insert_id();
				$data['plansid']=$last_id;
			}
		}else{
			$plansid =$this->getPlans(array('insurance_plans_id'=>$postVal['plansid'],'productid'=>$postVal['product_id']));
			$checkexits=$this->getInsurancePlans(array('insurance_id'=>$data['insurance_id'],'groupid'=>isset($plansid['groupid'])?$plansid['groupid']:0,'productid'=>$postVal['product_id']));
			if (count($checkexits)>0) {
				$data['plansid']=$checkexits[0]['insurance_plans_id'];
			}else{
				$plansid =$this->getPlans(array('insurance_plans_id'=>$postVal['plansid'],'productid'=>$postVal['product_id']));
				if (isset($plansid['insurance_plans_id'])) {
					$data['plansid']=$plansid['insurance_plans_id'];
				}else{
					$plansid =$this->getPlans(array('insurance_plans_id'=>$postVal['plansid']));
					$this->db->insert('insurance_plans',array('insurance_id'=>$data['insurance_id'],'employer_id'=>$data['employer_id'],'groupid'=>$plansid['groupid'],'productid'=>$postVal['product_id'],));
					$last_id=$this->db->insert_id();
					$data['plansid']=$last_id;
				}
				
			}
		}
		return $data;
	}

	function getInsurancePlans($postVal=array())
	{

		$res = array();
		$this->db->select('*');
		$this->db->from('insurance_plans');
		if (isset($postVal)) {
			if (isset($postVal['insurance_id']) && $postVal['insurance_id']>0) {
				$this->db->where('insurance_id',$postVal['insurance_id']);
			}
			if (isset($postVal['groupid']) && $postVal['groupid']>0) {
				$this->db->where('groupid',$postVal['groupid']);
			}
			if (isset($postVal['insurance_plans_id']) && $postVal['insurance_plans_id']>0) {
				$this->db->where('insurance_plans_id',$postVal['insurance_plans_id']);
			}
			if (isset($postVal['productid']) && $postVal['productid'] !='') {
				$this->db->where('productid',$postVal['productid']);
			}
		}

		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->result_array();
		}
		return $res;
	}

	function getPlans($postVal=array()){
		$res = array();
		$this->db->select('*');
		$this->db->from('insurance_plans');
		if (isset($postVal)) {
			if (isset($postVal['insurance_id']) && $postVal['insurance_id'] !='') {
				$this->db->where('insurance_id',$postVal['insurance_id']);
			}
			if (isset($postVal['groupid']) && $postVal['groupid'] !='') {
				$this->db->where('groupid',$postVal['groupid']);
			}
			if (isset($postVal['insurance_plans_id']) && $postVal['insurance_plans_id'] !='') {
				$this->db->where('insurance_plans_id',$postVal['insurance_plans_id']);
			}
			if (isset($postVal['productid']) && $postVal['productid'] !='') {
				$this->db->where('productid',$postVal['productid']);
			}
		}
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->row_array();
		}
		return $res;
	}

	function patientInsurance($patientid=0)
	{
		$res = array();
		$this->db->select('*');
		$this->db->from('patient_insurance');
		$this->db->where('patientid',$patientid);
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->result_array();
		}
		return $res;
	}

	function addNewPatient($postVal=array())
	{	
		$images =$this->getImagesName($postVal);
		$patient=array(
			'officeid'=>$postVal['officeid'],
			'p_firstname'=>isset($postVal['p_firstname'])?$postVal['p_firstname']:'',
			'p_lastname'=>isset($postVal['p_lastname'])?$postVal['p_lastname']:'',
			'p_dob'=>getDateYmd(isset($postVal['p_dob'])?$postVal['p_dob']:''),
			// 'dataentry'=>1,
			's_firstname'=>isset($postVal['s_firstname'])?$postVal['s_firstname']:'',
			's_lastname'=>isset($postVal['s_lastname'])?$postVal['s_lastname']:'',
			's_dob'=>getDateYmd(isset($postVal['s_dob'])?$postVal['s_dob']:''),
			'attachment_front'=>$images['front'],
			'attachment_back'=>$images['back'],
			'createdby'=>$postVal['id_user'],
			'creation_date'=>getCurrentDateTime(),
		);
		$this->db->insert('patients',$patient);
		$postVal['patientid']=$this->db->insert_id();

		$insurance=array(
			'officeid'=>$postVal['officeid'],
			'patientid'=>$postVal['patientid'],
			'plansid'=>$postVal['insurance_plans_id'],
			'employerid'=>isset($postVal['employerid'])?$postVal['employerid']:'',
			'memberid'=>isset($postVal['memberid'])?$postVal['memberid']:'',
			'ins_benefit_remaining'=>isset($postVal['ins_benefit_remaining'])?$postVal['ins_benefit_remaining']:'',
			'ind_ded_remaining'=>isset($postVal['ind_ded_remaining'])?$postVal['ind_ded_remaining']:'',
			'family_ded_remaining'=>isset($postVal['family_ded_remaining'])?$postVal['family_ded_remaining']:'',
			'effective_date'=>$postVal['effective_date'] !=''?getDateYmd($postVal['effective_date']):'',
			'createdby'=>$postVal['id_user'],
			'lastupdate'=>getCurrentDateTime(),
			'updatedby'=>$postVal['id_user'],
		);
		$insuranceCheck=$this->patientInsurance($postVal['patientid']);
		if (count($insuranceCheck)>0) {
			$this->db->where('patientid',$postVal['patientid']);
			$this->db->update('patient_insurance',$insurance);
		}else{
			$this->db->insert('patient_insurance',$insurance);
		}

		if (isset($postVal['insurance_agentname']) && $postVal['insurance_agentname'] !='') {
			$agent=array(
				'patientid'=>$postVal['patientid'],
				'insurance_agentname'=>$postVal['insurance_agentname'],
				'insurance_agentid'=>$postVal['insurance_agentid'],
				'createdby'=>$postVal['id_user'],
				'createdon'=>getCurrentDateTime(),
			);
			$this->db->insert('insurance_agent',$agent);
		}

		// insurance_agent
		if (isset($postVal['insurance_agentname']) && $postVal['insurance_agentname'] !='') {
			$agent=array(
				'patientid'=>$postVal['patientid'],
				'insurance_agentname'=>$postVal['insurance_agentname'],
				'insurance_agentid'=>$postVal['insurance_agentid'],
				'createdby'=>$postVal['id_user'],
				'createdon'=>getCurrentDateTime(),
			);
			$this->db->insert('insurance_agent',$agent);
		}


		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			$others=array(
				'ind_deductible_annual'	=>isset($postVal['ind_deductible_annual'])?$postVal['ind_deductible_annual']:'',
				'ind_limit_annual'	=>isset($postVal['ind_limit_annual'])?$postVal['ind_limit_annual']:'0',
				'family_deductible_annual'	=>isset($postVal['family_deductible_annual'])?$postVal['family_deductible_annual']:'',
				'family_limit_annual'	=>isset($postVal['family_limit_annual'])?$postVal['family_limit_annual']:'0',
				'ind_lifetime_limit'	=>isset($postVal['ind_lifetime_limit'])?$postVal['ind_lifetime_limit']:'0',
				'family_lifetime_limit'	=>isset($postVal['family_lifetime_limit'])?$postVal['family_lifetime_limit']:'0',
				'missing_tooth_clause'	=>isset($postVal['missing_tooth_clause'])?$postVal['missing_tooth_clause']:'0',
				'predetermination_needed'=>isset($postVal['predetermination_needed'])?$postVal['predetermination_needed']:'0',
				// 'predetermination_rec'	=>isset($postVal['predetermination_rec'])?$postVal['predetermination_rec']:'',
				'insurance_benefits'	=>isset($postVal['insurance_benefits'])?$postVal['insurance_benefits']:'',
						'preventive_deduction_applies'=>isset($postVal['preventive_deduction_applies'])?$postVal['preventive_deduction_applies']:'N',
				'diagnostic_deduction_applies'=>isset($postVal['diagnostic_deduction_applies'])?$postVal['diagnostic_deduction_applies']:'N',
				'restorative_deduction_applies'=>isset($postVal['restorative_deduction_applies'])?$postVal['restorative_deduction_applies']:'N',
				'endodontic_deduction_applies'=>isset($postVal['endodontic_deduction_applies'])?$postVal['endodontic_deduction_applies']:'N',
				'periodontics_deduction_applies'=>isset($postVal['periodontics_deduction_applies'])?$postVal['periodontics_deduction_applies']:'N',
				'prosthodonticsremovable_ded_applies'=>isset($postVal['prosthodonticsremovable_ded_applies'])?$postVal['prosthodonticsremovable_ded_applies']:'N',
				'maxillofacialprosthetics_ded_applies'=>isset($postVal['maxillofacialprosthetics_ded_applies'])?$postVal['maxillofacialprosthetics_ded_applies']:'N',
				'implants_ded_applies'=>isset($postVal['implants_ded_applies'])?$postVal['implants_ded_applies']:'N',
				'prosthodontics_fixed_ded_applies'=>isset($postVal['prosthodontics_fixed_ded_applies'])?$postVal['prosthodontics_fixed_ded_applies']:'N',
				'oralsurgery_ded_applies'=>isset($postVal['oralsurgery_ded_applies'])?$postVal['oralsurgery_ded_applies']:'N',
				'orthodontics_deduction_applies'=>isset($postVal['orthodontics_deduction_applies'])?$postVal['orthodontics_deduction_applies']:'N',
				'adjunctivegenservices_ded_applies'=>isset($postVal['adjunctivegenservices_ded_applies'])?$postVal['adjunctivegenservices_ded_applies']:'N',
				'preventive_percentage'	=>isset($postVal['preventive_percentage'])?$postVal['preventive_percentage']:'0',
				'diagnostics_percentage'=>isset($postVal['diagnostics_percentage'])?$postVal['diagnostics_percentage']:'0',
				'restorative_percentage'=>isset($postVal['restorative_percentage'])?$postVal['restorative_percentage']:'0',
				'endodontics_percentage'=>isset($postVal['endodontics_percentage'])?$postVal['endodontics_percentage']:'0',
				'periodontics_percentage'=>isset($postVal['periodontics_percentage'])?$postVal['periodontics_percentage']:'0',
				'prosthodonticsremovable_percentage' =>isset($postVal['prosthodonticsremovable_percentage'])?$postVal['prosthodonticsremovable_percentage']:'0',
				'maxillofacialprosthetics_percentage'=>isset($postVal['maxillofacialprosthetics_percentage'])?$postVal['maxillofacialprosthetics_percentage']:'0',
				'implants_percentage'=>isset($postVal['implants_percentage'])?$postVal['implants_percentage']:'0',
				'prosthodontics_fixed_percentage'=>isset($postVal['prosthodontics_fixed_percentage'])?$postVal['prosthodontics_fixed_percentage']:'0',
				'oralsurgery_percentage	'=>isset($postVal['oralsurgery_percentage'])?$postVal['oralsurgery_percentage']:'0',
				'orthodontics_percentage'=>isset($postVal['orthodontics_percentage'])?$postVal['orthodontics_percentage']:'0',
				'adjunctivegenservices_percentage'=>isset($postVal['adjunctivegenservices_percentage'])?$postVal['adjunctivegenservices_percentage']:'0',
				'allowed_frequency'	=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:'',
				'orthodontics_lifetime_max'	=>isset($postVal['orthodontics_lifetime_max'])?$postVal['orthodontics_lifetime_max']:'',
				'orthodontics_agelimit'	=>isset($postVal['orthodontics_agelimit'])?$postVal['orthodontics_agelimit']:'',
				'crown_payment'			=>isset($postVal['crown_payment'])?$postVal['crown_payment']:'',
				'orthodontics_payment'	=>isset($postVal['orthodontics_payment'])?$postVal['orthodontics_payment']:'',
				'filling_downgrades'	=>isset($postVal['filling_downgrades'])?$postVal['filling_downgrades']:'',
				'crown_molar_downgrades'=>isset($postVal['crown_downgrades'])?$postVal['crown_downgrades']:'',
				'crown_premolar_downgrades'=>isset($postVal['crown_premolar_downgrades'])?$postVal['crown_premolar_downgrades']:'',
				'preventive_waitingperiod'=>isset($postVal['preventive_waitingperiod'])?$postVal['preventive_waitingperiod']:'',
				'diagnostic_waitingperiod'=>isset($postVal['diagnostic_waitingperiod'])?$postVal['diagnostic_waitingperiod']:'',
				'restorative_waitingperiod'=>isset($postVal['restorative_waitingperiod'])?$postVal['restorative_waitingperiod']:'',
				'endodontics_waitingperiod'=>isset($postVal['endodontics_waitingperiod'])?$postVal['endodontics_waitingperiod']:'',
				'periodontics_waitingperiod'=>isset($postVal['periodontics_waitingperiod'])?$postVal['periodontics_waitingperiod']:'',
				'prosthodonticsremovable_waitingperiod'=>isset($postVal['prosthodonticsremovable_waitingperiod'])?$postVal['prosthodonticsremovable_waitingperiod']:'',
				'maxillofacialprosthetics_waitingperiod'=>isset($postVal['maxillofacialprosthetics_waitingperiod'])?$postVal['maxillofacialprosthetics_waitingperiod']:'',
				'implant_waitingperiod'=>isset($postVal['implant_waitingperiod'])?$postVal['implant_waitingperiod']:'',
				'prosthodontics_fixed_waitingperiod'=>isset($postVal['prosthodontics_fixed_waitingperiod'])?$postVal['prosthodontics_fixed_waitingperiod']:'',
				'oralsurgery_waitingperiod'=>isset($postVal['oralsurgery_waitingperiod'])?$postVal['oralsurgery_waitingperiod']:'',
				'orthodontics_waitingperiod'=>isset($postVal['orthodontics_waitingperiod'])?$postVal['orthodontics_waitingperiod']:'',
				'adjunctivegenservices_waitingperiod'=>isset($postVal['adjunctivegenservices_waitingperiod'])?$postVal['adjunctivegenservices_waitingperiod']:'',
				'updatedon'=>getCurrentDateTime(),
				'updatedby'=>$postVal['id_user'],
			);

			$this->db->where('insurance_plans_id',$postVal['insurance_plans_id']);
			$this->db->update('insurance_plans',$others);
		}

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['cdtgroups'])) {
				$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
				for ($i=0; $i < count($postVal['cdtgroups']) ; $i++) { 
					$result=$this->getCdtCodesSerach(trim($postVal['cdtgroups'][$i]));
					foreach ($result as $row) {
						$checkPlan= $this->singlePlans($plansid,$row['cdtid']);
						if (count($checkPlan)>0 ) {
							$data=array(
							'procedure_level'=>$postVal['procedure_level'][$i],
							'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$i],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage'][$i],
							'waiting'=>$postVal['waiting'][$i],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							);
							$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$row['cdtid']));
							$this->db->update('insurance_plans_cdt_codes',$data);
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$row['cdtid'],
							'procedure_level'=>$postVal['procedure_level'][$i],
							'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$i],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage'][$i],
							'waiting'=>$postVal['waiting'][$i],
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}
		// if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
		// 	if (isset($postVal['cdt_codes_id']) && count($postVal['cdt_codes_id'])>0) {
		// 		foreach ($postVal['cdt_codes_id'] as $key => $row) {
		// 			$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
		// 			if (isset($postVal['cdt_codes_id'][$key]) && $postVal['cdt_codes_id'][$key]>0) {
		// 				$checkPlan= $this->singlePlans($plansid,$postVal['cdt_codes_id'][$key]);
		// 				if (count($checkPlan)>0) {
		// 					$data=array(
		// 					'insurance_plans_id'=>$plansid,
		// 					'cdtid'=>$postVal['cdt_codes_id'][$key],
		// 					'procedure_level'=>$postVal['procedure_level'][$key],
		// 					'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$key],
		// 					'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
		// 					'coverage_percentage'=>$postVal['coverage_percentage'][$key],
		// 					'waiting'=>$postVal['waiting'][$key],
		// 					'updatedon'=>getCurrentDateTime(),
		// 					'updatedby'=>$postVal['id_user'],
		// 					);
		// 					$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['cdt_codes_id'][$key]));
		// 					$this->db->update('insurance_plans_cdt_codes',$data);
		// 				}else{
		// 					$data=array(
		// 					'insurance_plans_id'=>$plansid,
		// 					'cdtid'=>$postVal['cdt_codes_id'][$key],
		// 					'procedure_level'=>$postVal['procedure_level'][$key],
		// 					'allowed_frequency'=>$postVal['code_allowed_frequency_plan'][$key],
		// 					'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
		// 					'coverage_percentage'=>$postVal['coverage_percentage'][$key],
		// 					'waiting'=>$postVal['waiting'][$key],
		// 					'updatedon'=>getCurrentDateTime(),
		// 					'updatedby'=>$postVal['id_user'],
		// 					);
		// 					$this->db->insert('insurance_plans_cdt_codes',$data);
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['cdt_codes_id_single']) && count($postVal['cdt_codes_id_single'])) {
				foreach ($postVal['cdt_codes_id_single'] as $key => $row) {
					$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
					if (isset($postVal['cdt_codes_id_single'][$key]) && $postVal['cdt_codes_id_single'][$key]>0) {
						$checkPlan= $this->singlePlans($plansid,$postVal['cdt_codes_id_single'][$key]);
						if (count($checkPlan)>0) {
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['cdt_codes_id_single'][$key],
							'from_age'=>0,
							'to_age'=>$postVal['to_age_single'][$key],
							'allowed_frequency'=>$postVal['allowed_frequency_single'][$key],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage_single'][$key],
							'updatedon'=>getCurrentDateTime(),
							'updatedby'=>$postVal['id_user'],
							// 'waiting'=>$postVal['waiting_single'][$key],
							);
							$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['cdt_codes_id_single'][$key]));
							$this->db->update('insurance_plans_cdt_codes',$data);
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['cdt_codes_id_single'][$key],
							'from_age'=>0,
							'to_age'=>$postVal['to_age_single'][$key],
							'allowed_frequency'=>$postVal['allowed_frequency_single'][$key],
							'allowed_frequency_months'=>isset($postVal['allowed_frequency'])?$postVal['allowed_frequency']:1,
							'coverage_percentage'=>$postVal['coverage_percentage_single'][$key],
							'updatedon'=>getCurrentDateTime(),
							'updatedby'=>$postVal['id_user'],
							// 'waiting'=>$postVal['waiting_single'][$key],
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}

		if (isset($postVal['insurance_update']) && $postVal['insurance_update']>0) {
			if (isset($postVal['shares_cdtid']) && count($postVal['shares_cdtid'])) {
				foreach ($postVal['shares_cdtid'] as $key => $row) {
					$plansid=isset($postVal['plansid'])?$postVal['plansid']:0;
					if (isset($postVal['shares_cdtid'][$key]) && $postVal['shares_cdtid'][$key]>0) {
						$checkPlan= $this->singlePlans($plansid,$postVal['shares_cdtid'][$key]);
						if (count($checkPlan)>0) {
							$shares_freq_limit_exam=isset($postVal['shares_freq_limit_exam'])?$postVal['shares_freq_limit_exam']:0;
							$shares_freq_perio_maint=isset($postVal['shares_freq_perio_maint'])?$postVal['shares_freq_perio_maint']:0;
							if (isset($postVal['shares_freq_limit_exam']) && $postVal['shares_cdtid'][$key]==140) {
								$data=array(
								'insurance_plans_id'=>$plansid,
								'cdtid'=>$postVal['shares_cdtid'][$key],
								'shares_frequency'=>$shares_freq_limit_exam,
								'updatedon'=>getCurrentDateTime(),
								'updatedby'=>$postVal['id_user'],
								);
								$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['shares_cdtid'][$key]));
								$this->db->update('insurance_plans_cdt_codes',$data);
							}

							if (isset($postVal['shares_freq_perio_maint']) && $postVal['shares_cdtid'][$key]==4910) {
								$data=array(
								'insurance_plans_id'=>$plansid,
								'cdtid'=>$postVal['shares_cdtid'][$key],
								'shares_frequency'=>$shares_freq_perio_maint,
								'updatedon'=>getCurrentDateTime(),
								'updatedby'=>$postVal['id_user'],
								);
								$this->db->where(array('insurance_plans_id'=>$plansid,'cdtid'=>$postVal['shares_cdtid'][$key]));
								$this->db->update('insurance_plans_cdt_codes',$data);
							}
							
						}else{
							$data=array(
							'insurance_plans_id'=>$plansid,
							'cdtid'=>$postVal['shares_cdtid'][$key],
							'shares_frequency'=>isset($postVal['shares_freq_limit_exam'])?$postVal['shares_freq_limit_exam']:0,
							'shares_frequency'=>isset($postVal['shares_freq_perio_maint'])?$postVal['shares_freq_perio_maint']:0,
							'updatedon'=>getCurrentDateTime(),
							'updatedby'=>$postVal['id_user'],
							);
							$this->db->insert('insurance_plans_cdt_codes',$data);
						}
					}
				}
			}
		}

		if (isset($postVal['history_field']) && count($postVal['history_field'])) {
			if (isset($postVal['historyId']) && count($postVal['historyId'])>0) {
				foreach ($postVal['historyId'] as $key => $hRow) {
					if ($postVal['history_field'][$key] > 0) {
						$hdata=array(
							'officeid'=>$postVal['officeid'],
							'patientid'=>$postVal['patientid'],
							'cdtid'=> $postVal['history_field'][$key],
							'history_field_date1'=>$postVal['history_field_date1'][$key] !=''?getDateYmd($postVal['history_field_date1'][$key]):'',
							'history_field_date2'=>$postVal['history_field_date2'][$key] !=''?getDateYmd($postVal['history_field_date2'][$key]):'',
							'history_field_date3'=>$postVal['history_field_date3'][$key] !=''?getDateYmd($postVal['history_field_date3'][$key]):'',
							'history_field_date4'=>$postVal['history_field_date4'][$key] !=''?getDateYmd($postVal['history_field_date4'][$key]):'',
							'updatedby'=>$postVal['id_user'],
							'updatedon'=>getCurrentDateTime(),
						);

						$this->db->where(array('patientid'=>$postVal['patientid'],'cdtid'=>$postVal['history_field'][$key]));
						$this->db->update('patient_history',$hdata);
					}
				}
			}

			foreach ($postVal['history_field'] as $key => $hRow) {
				if ($postVal['history_field'][$key] >0 && isset($postVal['historyId'][$key]) &&$postVal['historyId'][$key]!=$postVal['history_field'][$key]) {
					$hdata=array(
						'officeid'=>$postVal['officeid'],
						'patientid'=>$postVal['patientid'],
						'cdtid'=> $postVal['history_field'][$key],
						'history_field_date1'=>$postVal['history_field_date1'][$key] !=''?getDateYmd($postVal['history_field_date1'][$key]):'',
						'history_field_date2'=>$postVal['history_field_date2'][$key] !=''?getDateYmd($postVal['history_field_date2'][$key]):'',
						'history_field_date3'=>$postVal['history_field_date3'][$key] !=''?getDateYmd($postVal['history_field_date3'][$key]):'',
						'history_field_date4'=>$postVal['history_field_date4'][$key] !=''?getDateYmd($postVal['history_field_date4'][$key]):'',
						'updatedby'=>$postVal['id_user'],
						'updatedon'=>getCurrentDateTime(),
					);
					
					$this->db->insert('patient_history',$hdata);
				}
			}

		}
		return array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully');
	}

	function OfficeCdtcodes($id=1)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('office_cdtcodes'.' c');
		$where = array('c.officeid' => $id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function getInsurance($id=0)
	{
		$result = array();
		$this->db->select('i.*');
		$this->db->from('insurance'.' i');
		$this->db->join('insurance_plans'.' p','i.insurance_id=p.insurance_id','left');
		$where = array('p.employer_id' => $id);
		$this->db->where($where);
		$this->db->group_by('i.insurance_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function getAjaxInsurancePlans($id=0)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('insurance_plans'.' p');
		$where = array('p.insurance_id' => $id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}

	function getImagesName($postVal=array())
	{	
		$data=array();
		if (isset($_FILES['Insurance_card_front']) && $_FILES['Insurance_card_front']['name']!='') {
			$file_name=$_FILES['Insurance_card_front']['name'];
			$temp = explode('.',$_FILES['Insurance_card_front']['name']);
			$filename=round(rand()) . '.' . end($temp);
			$target_dir = FILE_UPLOAD_PATH.'patient/';
		    //$target_file = $target_dir . basename($_FILES["image"]["name"]);
		    $target_file = $target_dir . $filename;
		    move_uploaded_file($_FILES["Insurance_card_front"]["tmp_name"], $target_file);
		    $data['front']='uploads/patient/'.$filename;

		}else{
			$data['front']='';
		}

		if (isset($_FILES['Insurance_card_back']) && $_FILES['Insurance_card_back']['name']!='') {
			$file_name=$_FILES['Insurance_card_back']['name'];
			$temp = explode('.',$_FILES['Insurance_card_back']['name']);
			$filename=round(rand()) . '.' . end($temp);
			$target_dir = FILE_UPLOAD_PATH.'patient/';
		    //$target_file = $target_dir . basename($_FILES["image"]["name"]);
		    $target_file = $target_dir . $filename;
		    move_uploaded_file($_FILES["Insurance_card_back"]["tmp_name"], $target_file);
		    $data['back']='uploads/patient/'.$filename;
		    
		}else{
			$data['back']='';
		}
		
		return $data;
	}

	function getAllUser()
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('users'.' u');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$result[$row['id_user']]=$row['first_name'].' '.$row['last_name'];
			}
		}
		return $result;
	}

	function OfficeName($id=1)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('officename'.' c');
		$where = array('c.officeid' => $id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function InsuranceAgent($id=1)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('insurance_agent'.' a');
		$where = array('a.patientid' => $id);
		$this->db->where($where);
		$this->db->order_by('a.idinsurance_agent','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function getCdtCodesSerach($group='')
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('cdt_codes');
		$this->db->like('cdtgroups', $group);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}
//End
}
?>
