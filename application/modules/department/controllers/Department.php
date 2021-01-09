<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:17 PM
 */
class Department extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('department_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

   	function addDepartment(){
		$data = array();
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('add_department') == TRUE) {
				$_POST['action_by'] = $this->id_user;
				$postVal = $_POST;
				$returnVal = $this->department_model->addDepartment($postVal);
				$this->setSuccessFailMessage($returnVal);
				if($returnVal['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'department/allDepartment');
				}
			}
		}
		$data['pvalue'] = array("view" => "add_view",'title'=>'Add Department',"page_sub_title" => "Add Department");
		$this->loadView($data);
   }

   function allDepartment(){
   	$postVal = (isset($_POST['search_val'])) ? $_POST['search_val'] : array();
		$postVal['page'] = ((isset($_POST['search_val']) && isset($postVal['page_num']))) ? $postVal['page_num'] : 1;;
		$postVal['query_type'] = 'count';
		$total = $this->department_model->getDepartmentList($postVal);
		$postVal['query_type'] = 'pagination';
		$data['department'] = $this->department_model->getDepartmentList($postVal);
		$data['pagination'] = displayPagination($total,PERPAGE_RECORDS,$postVal['page'],'btnPaginationSearch');
		$data['count'] = ($postVal['page']-1) * PERPAGE_RECORDS;
		$data['post_url'] = 'department/allDepartment';
		$data['searchVal'] = $postVal;
		/*Pagination end here*/
		if(isset($_POST['search_val'])){
			$this->load->view('ajax_list_view',$data);
		}else {
			$data['pvalue'] = array('view' => 'list_view', 'title' => 'Department');
			$this->loadView($data);
		}
   }

   function editDepartment(){
		$_GET = getDecryptArray($_GET);
		$id = (isset($_GET['department']))?$_GET['department']:0;
		if($id==0){
			redirect(WEB_URL.'dashboard/index');
		}
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('edit_department') == true){
				$postVal = $_POST;
				$result = $this->department_model->updateDepartment($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] = STATUS_SUCCESS){
					redirect(WEB_URL.'department/allDepartment');
				}
			}
		}
		$data['department'] = $this->department_model->getDepartmentView(array('id_department' => $id));;
		$data['pvalue'] = array('view' => "edit_view" ,'title' => 'Edit Department', 'page_sub_title' => 'Edit Department');
		$this->loadView($data);
   }

   function addDepartmentList(){
        $data = array();
		$data['pvalue'] = array("view" => "add_view",'title'=>'Add Department',"page_sub_title" => "Add Department");
		$this->loadView($data);
   }

   function check_department_code(){
		$response = $this->department_model->getDepartmentDetailsBsdnCode($this->input->post());
		if(!empty($response)){
			$this->form_validation->set_message('check_department_code', 'This code already exist.');
			return FALSE;
		}
		return TRUE;
	}
//End
}
?>
