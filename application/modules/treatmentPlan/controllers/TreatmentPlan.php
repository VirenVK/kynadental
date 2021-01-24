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

		$view = "treatmentPlan/treatment_plan.php";
		$data['pvalue'] = array("page_title" => "Treatment Plan", "page_sub_title" => "Treatment Plan", "view" => $view);
		$this->loadView($data);
    }
    
    function patientTrtmntPlan(){
        $patient_id = isset($_GET['patientid']) && $_GET['patientid']>0 ? $_GET['patientid'] : 0;
        $data['officeId'] = isset($_GET['officeId']) ? $_GET['officeId'] : 1;

        $data['patient'] = $this-> patient_model ->patientdetails($patient_id);
		$data['treatmentGroups'] = $this-> treatment_plan_model -> getTreatmentGroups($data['officeId']);
    
		$data['pvalue'] = array('view' => 'patient_treatment_plan.php', 'title' => 'Patient treatment plan');
		$this->loadView($data);
	}
	
	function getCdtCodesByTrtmtGroupId(){
        $patient_id = isset($_GET['patientid']) && $_GET['patientid']>0 ? $_GET['patientid'] : 0;
		$data['officeId'] = isset($_GET['officeId']) ? $_GET['officeId'] : 1;
		
		$treatmentGroupId = $this->input->post('treatmentGroupId');
		$remainingTrtmntGrpId = $this->input->post('remainingTrtmntGrpId');
		
		$json = $this-> treatment_plan_model -> getCdtCodesByTrtmtGroupId($treatmentGroupId, $data['officeId'], $remainingTrtmntGrpId);
        header('Content-Type: application/json');
		echo json_encode($json);
    }
    //End
}
?>
    