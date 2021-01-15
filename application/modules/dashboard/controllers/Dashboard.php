<?php
class Dashboard extends MY_Controller{
	function __construct()
	{
		parent::__construct(FALSE);
		$this->load->model('dashboard_model');
		$this->load->model('patient/patient_model');
	    $this->load->model('common_model');

	}

	function index(){

		$this->adminDashboard();
	}

	function adminDashboard(){

		$postVal=$_POST;
		$postVal['officeId']=isset($_GET['officeId'])?$_GET['officeId']:1;
		$postVal['userid']=$this->id_user;
		if (isset($_POST['f_name'])) {
			$data['patient_data']=1;
		}else{
			$data['patient_data']=0;
		}
		$data['total_jd'] = 0;//$this->dashboard_model->getNewJd();
		$data['total_condidate'] = 0;//$this->dashboard_model->getNewCondidate();
		$data['office'] = $this->dashboard_model->office($postVal);
		$data['allpatient'] = $this->dashboard_model->allpatient($postVal);
		$data['allpatientdataentry'] = $this->dashboard_model->allpatientDataentry($postVal);
		$view = "admin_dashboard_view";
		$data['pvalue'] = array("page_title" => "Dashboard", "page_sub_title" => "Dashboard", "view" => $view);
		$this->loadView($data);
	}

	function editpatient()
	{	

		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$postVal['id_user']=$this->id_user;
			$returnVal=$this->dashboard_model->updatePatientDetailsPlan($postVal);
			$this->setSuccessFailMessage($returnVal);
			if($returnVal['status'] == STATUS_SUCCESS){
				redirect(WEB_URL.'dashboard/index');
			}
		}

		$id=isset($_GET['id']) && $_GET['id']>0?$_GET['id']:0;
		$plansid=isset($_GET['plansid']) && $_GET['plansid']>0?$_GET['plansid']:0;
		$data['insurance']=$this->common_model->getAllInsurance();
		$data['insurance_plans']=$this->common_model->getAllInsurancePlan();
		$data['employers']=$this->common_model->getAllEmployers();
		$data['cdt_codes']=$this->patient_model->getCdtCodes();
		//printData($data['cdt_codes']);
		$data['feeschedule'] = $this->dashboard_model->getFeeSchedule(1);
		$data['office_cdtcodes'] = $this->dashboard_model->OfficeCdtcodes(1);
		$data['officeName'] = $this->dashboard_model->OfficeName(1);
		$data['patient'] = $this->patient_model->patientdetails($id);
		$data['patientInsurance'] = $this->patient_model->patientInsurance($id);
		$data['plan'] = $this->dashboard_model->Plans($plansid);
		$data['others'] = array();
		$data['insurancePlans'] = $this->dashboard_model->insurancePlans(isset($plansid)?$plansid:0);
		$data['history'] = $this->dashboard_model->PatientHistory($id);
		$data['users'] = $this->dashboard_model->getAllUser();
		$data['agent'] = $this->dashboard_model->InsuranceAgent($id);

		$data['pvalue'] = array('view' => 'edit_patient', 'title' => 'Edit Patient');
		$this->loadView($data);
	}

	function addInsurance()
	{	
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$returnVal=$this->dashboard_model->addInsurance($postVal);
			$this->setSuccessFailMessage($returnVal);
			if($returnVal['status'] == STATUS_SUCCESS){
				if ($postVal['patientid']==0) {
					redirect(WEB_URL.'dashboard/addNewPatient?plansid='.$returnVal['data']);
				}
				redirect(WEB_URL.'dashboard/editpatient?id='.$postVal['patientid'].'&plansid='.$returnVal['data']);
			}
		}
		$data['postVal']=$_GET;
		$data['insurance']=$this->common_model->getAllInsurance();
		$data['insurance_plans']=$this->common_model->getAllInsurancePlan();
		$data['employers']=$this->common_model->getAllEmployers();
		$data['pvalue'] = array('view' => 'edit_patient', 'title' => 'Edit Patient');
		$this->load->view('add_insurance',compact('data'));
	}

	function addNewPatient()
	{
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$postVal['officeid']=1;
			$postVal['id_user']=$this->id_user;
			$returnVal=$this->dashboard_model->addNewPatient($postVal);
			$this->setSuccessFailMessage($returnVal);
			if($returnVal['status'] == STATUS_SUCCESS){
				redirect(WEB_URL.'dashboard/index');
			}
		}

		$id=isset($_GET['id']) && $_GET['id']>0?$_GET['id']:0;
		$plansid=isset($_GET['plansid']) && $_GET['plansid']>0?$_GET['plansid']:0;

		$data['insurance']=$this->common_model->getAllInsurance();
		$data['insurance_plans']=$this->common_model->getAllInsurancePlan();
		$data['employers']=$this->common_model->getAllEmployers();
		$data['cdt_codes']=$this->patient_model->getCdtCodes();
		$data['office_cdtcodes'] = $this->dashboard_model->OfficeCdtcodes(1);

		$data['feeschedule'] = $this->dashboard_model->getFeeSchedule(1);
		$data['officeName'] = $this->dashboard_model->OfficeName(1);
		$data['patient'] = $this->patient_model->patientdetails($id);
		$data['patientInsurance'] = $this->patient_model->patientInsurance($id);
		$data['plan'] = $this->dashboard_model->Plans($plansid);
		$data['others'] = array();
		$data['insurancePlans'] = $this->dashboard_model->insurancePlans(isset($plansid)?$plansid:0);
		$data['history'] = $this->dashboard_model->PatientHistory($id);
		$data['users'] = $this->dashboard_model->getAllUser();

		$data['pvalue'] = array('view' => 'add_patient', 'title' => 'Add Patient');
		$this->loadView($data);
	}

	function getInsurance()
	{	
		$id= isset($_GET['employerId'])?$_GET['employerId']:0;
		$select= isset($_GET['selected'])?$_GET['selected']:0;
		$getInsurance = $this->dashboard_model->getInsurance($id);
		$option='<option value=0>Please Select</option>';
		foreach ($getInsurance as $row) {
			if ($row['insurance_id']==$select) {
				$option.='<option value='.$row['insurance_id'].' selected>'.$row['insurancename'].'</option>';
			}else{
				$option.='<option value='.$row['insurance_id'].'>'.$row['insurancename'].'</option>';
			}
		}
		echo $option;

	}

	function getPlans()
	{
		$id= isset($_GET['insurance_id'])?$_GET['insurance_id']:0;
		$employerid= isset($_GET['employerid'])?$_GET['employerid']:0;
		$getInsurance = $this->dashboard_model->getAjaxInsurancePlans($id,$employerid);
		$select= isset($_GET['selected'])?$_GET['selected']:0;
		$option='<option value=0>Please Select</option>';
		foreach ($getInsurance as $row) {
			if ($row['insurance_plans_id']==$select) {
				$option.='<option value='.$row['insurance_plans_id'].' selected>'.$row['groupid'].'</option>';
			}else{
				$option.='<option value='.$row['insurance_plans_id'].'>'.$row['groupid'].'</option>';
			}
		}
		echo $option;
	}

	function patientPdf()
	{	
				$this->load->library('pdf');

		$id=isset($_GET['id']) && $_GET['id']>0?$_GET['id']:0;
		$plansid=isset($_GET['plansid']) && $_GET['plansid']>0?$_GET['plansid']:0;
		$insurance=$this->common_model->getAllInsurance();
		$insurance_plans=$this->common_model->getAllInsurancePlan();
		$employers=$this->common_model->getAllEmployers();
		$cdt_codes=$this->patient_model->getCdtCodes();
		$office_cdtcodes = $this->dashboard_model->OfficeCdtcodes(1);
		$officeName = $this->dashboard_model->OfficeName(1);
		$patient = $this->patient_model->patientdetails($id);
		$patientInsurance = $this->patient_model->patientInsurance($id);
		$plan = $this->dashboard_model->Plans($plansid);
		$insurancePlans = $this->dashboard_model->insurancePlans(isset($plansid)?$plansid:0);
		$history = $this->dashboard_model->PatientHistory($id);
		$users = $this->dashboard_model->getAllUser();
		$agent = $this->dashboard_model->InsuranceAgent($id);
		$feeschedule = $this->dashboard_model->getFeeSchedule(1);
		$office_cdtcodes = $this->dashboard_model->getOfficeCdtcodes(1,$plansid);
		// printData($office_cdtcodes);
		// exit();
		// $data['pvalue'] = array('view' => 'edit_patient', 'title' => 'Edit Patient');


		$html=$this->load->view('pdf_patient',compact('insurance','insurance_plans','employers','cdt_codes','office_cdtcodes','officeName','patient','patientInsurance','plan','insurancePlans','history','users','agent','feeschedule'),true);
		//$html = $this->output->get_output();
		$this->pdf->generate($html,'CustomerInvoice');
		//$this->load->view('pdf_patient',$data);
	}


//End
}
?>
