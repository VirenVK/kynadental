<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:17 PM
 */
class Temp extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function listPage(){
		/*Pagination start here*/
		$postVal = (isset($_POST['search_val'])) ? $_POST['search_val'] : array();
		$postVal['page'] = ((isset($_POST['search_val']) && isset($postVal['page_num']))) ? $postVal['page_num'] : 1;;
		$postVal['query_type'] = 'count';
		$total = 10;
		$postVal['query_type'] = 'pagination';
		$data['company'] = array();
		$data['pagination'] = displayPagination($total,PERPAGE_RECORDS,$postVal['page'],'btnPaginationSearch');
		$data['count'] = ($postVal['page']-1) * PERPAGE_RECORDS;
		$data['post_url'] = '#';
		$data['searchVal'] = $postVal;
		/*Pagination end here*/
		if(isset($_POST['search_val'])){
			$this->load->view('ajax_list_view',$data);
		}else {
			$data['pvalue'] = array('view' => 'list_view', 'title' => 'Company');
			$this->loadView($data);
		}
	}

	function submit(){
		//set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

		//run validation check
		if ($this->form_validation->run() == FALSE){   //validation fails
			echo validation_errors();
		}else{
			echo "YES";
		}
	}

	//custom validation function to accept alphabets and space
	function alpha_space_only($str){
		if (!preg_match("/^[a-zA-Z ]+$/",$str)){
			$this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
//End
}
?>
