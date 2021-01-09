<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 24/7/19
 * Time: 6:05 PM
 */
class Patient extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('patient_model');
		$this->load->model('employee/employee_model');
		$this->load->model('common_model');
		$this->load->model('csclmng/csclmng_model','csclmng_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function allpatient(){
		/*Pagination start here*/
		$postVal = (isset($_POST['search_val'])) ? $_POST['search_val'] : array();
		$postVal['page'] = ((isset($_POST['search_val']) && isset($postVal['page_num']))) ? $postVal['page_num'] : 1;;
		$postVal['query_type'] = 'count';
		$postVal['is_employee'] = 'Y';
		$total = $this->patient_model->allpatient($postVal);
		$postVal['query_type'] = 'pagination';
		$data['employee'] = $this->patient_model->allpatient($postVal);
		$data['pagination'] = displayPagination($total,PERPAGE_RECORDS,$postVal['page'],'btnPaginationSearch');
		$data['count'] = ($postVal['page']-1) * PERPAGE_RECORDS;
		$data['post_url'] = 'patient/allpatient';
		$data['searchVal'] = $postVal;
		/*Pagination end here*/
		if(isset($_POST['search_val'])){
			$this->load->view('ajax_list_employee_view',$data);
		}else {
			$data['pvalue'] = array('view' => 'list_employee_view', 'title' => 'All Patient');
			$this->loadView($data);
		}
	}

	function editpatient()
	{	

		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$returnVal=$this->patient_model->updatePatientDetails($postVal);
			$this->setSuccessFailMessage($returnVal);
			if($returnVal['status'] == STATUS_SUCCESS){
				redirect(WEB_URL.'patient/allpatient');
			}
		}

		$id=$_GET['id'];
		$data['insurance']=$this->common_model->getAllInsurance();
		$data['insurance_plans']=$this->common_model->getAllInsurancePlan();
		$data['employers']=$this->common_model->getAllEmployers();
		$data['cdt_codes']=$this->patient_model->getCdtCodes();

		$data['patient'] = $this->patient_model->patientdetails($id);
		$data['patientInsurance'] = $this->patient_model->patientInsurance($id);
		$data['others'] = array();
		$data['pvalue'] = array('view' => 'edit_patient', 'title' => 'Edit Patient');
		$this->loadView($data);
	}
//End
}
?>
