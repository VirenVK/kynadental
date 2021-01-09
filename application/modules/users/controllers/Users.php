<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 21/5/19
 * Time: 6:46 PM
 */
class Users extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('csclmng/csclmng_model','csclmng_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function profile(){
		$id = $this->id_user;
		$data['user'] = $this->user_model->profileDetail($id);
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('profile') == true){
				$result = $this->user_model->updateProfile($id,$postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'users/profile');
				}
			}
		}
		$postArr = array('country_level' => 1);
		$data['country1'] = $this->csclmng_model->getCsc($postArr);
		$postArr = array('country_level' => 2,'id_parent'=>$data['user']['country1']);
		$data['state1'] = $this->csclmng_model->getCsc($postArr);
		$postArr = array('country_level' => 3,'id_parent'=>$data['user']['state1']);
		$data['city1'] = $this->csclmng_model->getCsc($postArr);
		$data['pvalue'] = array("page_title" => "Profile", "page_sub_title" => "Profile", "view" => "profile_view");
		$this->loadView($data);
	}

	function changePassword(){
		$id = $this->id_user;
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('password') == true){
				$result = $this->user_model->updatePassword($id,$postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'users/changePassword');
				}
			}
		}
		$view = "change_password_view";
		$data['pvalue'] = array("page_title" => "Change Password", "page_sub_title" => "Change Password", "view" => $view);
		$this->loadView($data);
	}
//End
}
?>
