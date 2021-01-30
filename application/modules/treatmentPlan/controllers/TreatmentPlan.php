<?php
class TreatmentPlan extends MY_Controller{
	function __construct()
	{
		parent::__construct(FALSE);
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('patient/patient_model');
		$this->load->model('treatment_plan_model');
	    $this->load->model('common_model');

    }

    function index(){

		$this->treatmentPlan();
	}
    
    function treatmentPlan(){
		$postVal=$_POST;
		$postVal['officeId']=$this->id_office;
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

		$view = "treatmentPlan/treatment_plan.php";
		$data['pvalue'] = array("page_title" => "Treatment Plan", "page_sub_title" => "Treatment Plan", "view" => $view);
		$this->loadView($data);
    }
    
    function patientTrtmntPlan(){
    	if (isset($_POST['submit']) && $_POST['submit']=='submit') {
    		$postVal=$_POST;
    		$postVal['id_user']=$this->id_user;
    		$postVal['officeid'] = $this->id_office;
    		$returnVal= $this->treatment_plan_model->addPatientTrtmntPlan($postVal);
    		$this->setSuccessFailMessage($returnVal);
			if($returnVal['status'] == STATUS_SUCCESS){
				redirect(WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$postVal['patientid']);
			}
			redirect(WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$postVal['patientid']);
    	}

        $patient_id = isset($_GET['patientid']) && $_GET['patientid']>0 ? $_GET['patientid'] : 0;
        $data['officeId'] = $this->id_office;
        $data['patient'] = $this->patient_model->patientdetails($patient_id);
		$data['treatmentGroups'] = $this->treatment_plan_model->getTreatmentGroups($data['officeId']);
		$data['cdt_codes'] = $this->treatment_plan_model->getCdtCodes($data['officeId']);
		$data['dentist'] = $this->treatment_plan_model->getDentist($data['officeId']);
    
		$data['pvalue'] = array('view' => 'patient_treatment_plan', 'title' => 'Patient treatment plan');
		$this->loadView($data);
	}
	
	function getCdtCodesByTrtmtGroupId(){
        $patient_id = isset($_GET['patientid']) && $_GET['patientid']>0 ? $_GET['patientid'] : 0;
		$data['officeId'] = isset($_GET['officeId']) ? $_GET['officeId'] : 1;
		
		$treatmentGroupId = $this->input->post('treatmentGroupId');
		$remainingTrtmntGrpId = $this->input->post('remainingTrtmntGrpId');
		
		$json = $this->treatment_plan_model -> getCdtCodesByTrtmtGroupId($treatmentGroupId, $data['officeId'], $remainingTrtmntGrpId);
        header('Content-Type: application/json');
		echo json_encode($json);
    }

    function allPatientTrtmntPlan()
    {
    	if (isset($_GET['patientid']) && $_GET['patientid'] >0) {
    		$postVal['patientid']= $_GET['patientid'];
    		$postVal['officeid'] = $this->id_office;
    		$data['patientTrtmnt'] = $this->treatment_plan_model->allPatientTrtmntPlanList($postVal);
   			$data['patientid'] = $_GET['patientid'];
    		$data['pvalue'] = array('view' => 'allPatientTrtmntPlan', 'title' => 'Patient Treatment Plan');
			$this->loadView($data);

    	}
    }

    function treatmentPlanDetails()
    {	
    	$officeid = $this->id_office;
    	$id=$_GET['id'];
    	$patientid = $_GET['patientid'];
    	$postVal['patientid']=$patientid;
    	$postVal['officeid'] = $officeid;
    	$postVal['id']=$id;
    	$data['patient'] = $this->patient_model->patientdetails($patientid);
    	$data['officeName'] = $this->dashboard_model->OfficeName($officeid);
    	$data['lines'] = $this->treatment_plan_model->allTreatmentPlanDetails($postVal);
    	$data['header'] = $this->treatment_plan_model->HeaderTreatmentPlanDetails($postVal);
    	$data['pvalue'] = array('view' => 'treatmentPlanDetails', 'title' => 'Patient Treatment Plan');
			$this->loadView($data);
    }

    function deleteTreatmentPlan()
    {
    	$postVal=$_GET;
    	$returnVal= $this->treatment_plan_model->deletePatientTrtmntPlan($postVal);
		$this->setSuccessFailMessage($returnVal);
		if($returnVal['status'] == STATUS_SUCCESS){
			redirect(WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$postVal['patientid']);
		}
		redirect(WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$postVal['patientid']);
    }
    //End
}
?>
    