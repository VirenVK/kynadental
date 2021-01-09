<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 24/7/19
 * Time: 6:05 PM
 */
class Employee extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->model('csclmng/csclmng_model','csclmng_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function allEmployee(){
		/*Pagination start here*/
		$postVal = (isset($_POST['search_val'])) ? $_POST['search_val'] : array();
		$postVal['page'] = ((isset($_POST['search_val']) && isset($postVal['page_num']))) ? $postVal['page_num'] : 1;;
		$postVal['query_type'] = 'count';
		$postVal['is_employee'] = 'Y';
		$total = $this->employee_model->getUserList($postVal);
		$postVal['query_type'] = 'pagination';
		$data['employee'] = $this->employee_model->getUserList($postVal);
		$data['pagination'] = displayPagination($total,PERPAGE_RECORDS,$postVal['page'],'btnPaginationSearch');
		$data['count'] = ($postVal['page']-1) * PERPAGE_RECORDS;
		$data['post_url'] = 'employee/allEmployee';
		$data['searchVal'] = $postVal;
		/*Pagination end here*/
		if(isset($_POST['search_val'])){
			$this->load->view('ajax_list_employee_view',$data);
		}else {
			$data['pvalue'] = array('view' => 'list_employee_view', 'title' => 'Employee');
			$this->loadView($data);
		}
	}

	function addEmployee(){
		$data = array();
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$postVal['image'] = "Blank-avatar.png";
			if(isset($_FILES['fileToUpload']['name'])){
				$target_dir = FILE_UPLOAD_PATH;
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$postVal['image'] = $_FILES['fileToUpload']['name'];
				}
			}
			if($this->form_validation->run('add_employee') == TRUE) {
				$postVal['is_employee'] = 'Y';
				$postVal['id_user_type'] = 2;
				$postVal['action_by'] = $this->id_user;
				$returnVal = $this->employee_model->addUser($postVal);
				$this->setSuccessFailMessage($returnVal);
				if($returnVal['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'employee/allEmployee');
				}
			}
			
		}
		$this->load->model('department/department_model','department_model');
		$data['roles'] = $this->common_model->getRole();
		$data['country'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 1));
		$data['department'] = $this->department_model->getDepartmentKeyValue(array('ps'=>''));
		$data['pvalue'] = array('view'=>'add_employee_view','page_title'=>'Add Employee',"page_sub_title" => "Add Employee");
		$this->loadView($data);
	}
	
	function check_unique_email($str){
		if($this->employee_model->validate_employee($str)){
			$this->form_validation->set_message('check_unique_email', 'Employee Already Registered.');
			return false;
		}
		return true;
	}

	function editEmployee(){
		$_GET = getDecryptArray($_GET);
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			$postVal['image'] = 'Blank-avatar.png';
			if(isset($_FILES['fileToUpload']['name'])){
				$target_dir = FILE_UPLOAD_PATH;
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$postVal['image'] = $_FILES['fileToUpload']['name'];
				}
			}
			if($this->form_validation->run('edit_employee') == true){
				$result = $this->employee_model->updateEmployee($id,$postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'employee/allEmployee');
				}
			}
		}
		$this->load->model('department/department_model','department_model');
		$data['roles'] = $this->common_model->getRole();
		$data['department'] = $this->department_model->getDepartmentKeyValue(array('ps'=>''));
		$data['employee'] = $this->employee_model->getEmpDetails(array('id_user' => $id));
		$data['country'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 1));
		$data['state1'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 2,'id_parent'=>$data['employee']['country1']));
		$data['city1'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 3,'id_parent'=>$data['employee']['state1']));
		$data['state2'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 2,'id_parent'=>$data['employee']['country2']));
		$data['city2'] = $this->common_model->getLocation(array('ps'=>'','country_level' => 3,'id_parent'=>$data['employee']['state2']));
		$data['pvalue'] = array("view" => "edit_employee_view","page_title"=>"Edit Employee","page_sub_title" => "Edit Employee");
		$this->loadView($data);
	}

	function loginEmployee(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			$result = $this->employee_model->createEmpLogin($_POST);
			$this->setSuccessFailMessage($result);
			if($result['status'] == STATUS_SUCCESS){
				redirect(WEB_URL.'employee/allEmployee');
			}
		}
		$data['employee'] = $this->employee_model->getEmpDetails(array('id_user'=>$id));
		$data['pvalue'] = array('view'=>'login_employee_view','title' => 'Login Employee','sub_title' => 'Login Here');
		$this->loadView($data);
	}

	function mngCompCode(){
		$_GET = getDecryptArray($_GET);
		$id = (isset($_GET['empid']))?$_GET['empid']:0;
		if($id==0){
			redirect(WEB_URL.'dashboard/index');
		}
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('manage_company_code') == TRUE) {
				$postVal = $_POST;
				$returnVal = $this->employee_model->updateCompCodeEmpMap($postVal);
				$this->setSuccessFailMessage($returnVal);
				redirect(WEB_URL.'employee/allEmployee');
			}
		}
		$data['employee'] = $this->employee_model->getEmpDetails(array('id_user'=>$id));
		$allCodeMapping = $this->common_model->getUserAccessCompCode(array('id_user'=>$id));
		$arr = cnvtArrToKeyValue('id_company_code',$allCodeMapping);
		$data['codeMapping'] = $arr['ids'];
		$data['compCodes'] = $this->common_model->getCompanyCode();
		$data['pvalue'] = array('view' => "mng_comp_code_view",'title' => 'Employee Access','page_sub_title' => 'Employee Access');
		$this->loadView($data);
	}
//End
}
?>
