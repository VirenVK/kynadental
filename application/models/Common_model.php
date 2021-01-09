<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 22/7/19
 * Time: 11:50 AM
 */
class Common_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getMasterData($postVal=array()){
		$result = array();
		if(isset($postVal['ps'])) {
			$result[''] = 'Please Select '.$postVal['ps'];
		}
		$fields = "md.*";
		$this->db->select($fields);
		$this->db->from(TBL_MASTER_DATA.' md');
		$where = array('md.is_active'=>'Y','md.master_code'=>$postVal['parent_code']);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id']] = $val['name'];
			}
		}
		return $result;
	}

	function getRole(){
		$res = array(''=>'Select Role');
		$fields = "r.id_role,r.role_name";
		$this->db->select($fields);
		$this->db->from(TBL_ROLES.' r');
		$this->db->where('r.id_role != 1');
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $r){
				$res[$r['id_role']] = $r['role_name'];
			}
		}
		return $res;
	}

	function getLocation($postVal = array()){
		$result = array();
		if(isset($postVal['ps'])){
			$result[''] = 'Please Select'.$postVal['ps'];
		}
		$fields = "l.id,l.name";
		$this->db->select($fields);
		$this->db->from(TBL_LOCATION.' l');
		$where = array();
		if(isset($postVal['id_parent']) && $postVal['id_parent'] > 0){
			$where['l.id_parent'] = $postVal['id_parent'];
		}
		if(isset($postVal['country_level']) && $postVal['country_level'] > 0){
			$where['l.country_level'] = $postVal['country_level'];
		}
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id']] = $val['name'];
			}
		}
		return $result;
	}

	function getAllInsurance(){
		$res = array();
		$this->db->select('*');
		$this->db->from('insurance');
		$this->db->order_by('insurancename','desc');
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->result_array();
		}
		return $res;
	}
	function getAllInsurancePlan(){
		$res = array();
		$this->db->select('*');
		$this->db->from('insurance_plans');
		$this->db->order_by('groupid','desc');
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->result_array();
		}
		return $res;
	}
	function getAllEmployers(){
		$res = array();
		$this->db->select('*');
		$this->db->from('employers');
		$this->db->order_by('employersname','asc');
		$query =  $this->db->get();
		if($query->num_rows() > 0){
			$res=$query->result_array();
		}
		return $res;
	}

	function addPatient($postVal=array())
	{	
		// $insurancePlan=$this->getInsurancePlan($postVal);
		$images       =$this->getImagesName($postVal);
		$patient=array(
			'officeid'=>$postVal['officeid'],
			'p_firstname'=>$postVal['p_firstname'],
			'p_lastname'=>$postVal['p_lastname'],
			'p_dob'=>$postVal['p_dob'],
			's_firstname'=>$postVal['s_firstname'],
			's_lastname'=>$postVal['s_lastname'],
			's_dob'=>$postVal['s_dob'],
			'attachment_front'=>$images['front'],
			'attachment_back'=>$images['back'],	
			'creation_date'=>getCurrentDateTime()
		);
		if($this->db->insert('patients',$patient)){
			$last_id=$this->db->insert_id();
			// $patient_insurance=array(
			// 	'officeid'=>$postVal['officeid'],
			// 	'patientid'=>$last_id,
			// 	'plansid'=>isset($insurancePlan['plansid'])?$insurancePlan['plansid']:0,
			// 	'employerid'=>isset($insurancePlan['employer_id'])?$insurancePlan['employer_id']:0,
			// 	'memberid'=>$postVal['member_id']
			// );
			// $this->db->insert('patient_insurance',$patient_insurance);	

			//$this->db->insert('patients_others_details',array('patientid'=>$last_id));
		}

		return array('status'=>STATUS_SUCCESS,'msg'=>'Form filled ,thanks for your patience!','data'=>array());

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
//End
}
?>
