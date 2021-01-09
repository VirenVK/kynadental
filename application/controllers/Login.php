<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 13/5/19
 * Time: 2:18 PM
 */
class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	/*This is default method*/
	function index(){
		$this->load->view('login/login_view');
	}

	function checkUserLogin(){
		$postArr = $this->input->post();
		if(isset($postArr['submit']) && $postArr['submit']=='submit'){
			$returnVal = $this->login_model->checkLogin($postArr);
			if($returnVal['status']==STATUS_SUCCESS) {
				$row = $returnVal['data'];
				unset($row['is_login_active']);
				unset($row['is_active']);
				/*Login-in user logout*/
				$row['user_ci_session_id'] = $this->session->session_id;
				$this->login_model->logOutFromOldSessionId($row);
				/*Insert in login history*/
				$logic_source = $this->checkBrowser();
				$login_history = array("ip_address"=>$_SERVER["REMOTE_ADDR"],"logic_source"=>$logic_source,"id_user"=>$row['id_user']);
				$this->login_model->addLoginTime($login_history);
				/*Set Value in session*/
				unset($row['ci_session_id']);
				unset($row['user_ci_session_id']);
				$this->session->set_userdata($row);
				redirect(WEB_URL . 'dashboard/index');
			}else{
				$this->setSuccessFailMessage(array('status'=>STATUS_FAIL,'msg'=>'Please enter correct username and password'));
				redirect(WEB_URL.'login');
			}
		}else{
			$this->setSuccessFailMessage(array('status'=>STATUS_FAIL,'msg'=>'Please enter correct username and password'));
			redirect(WEB_URL.'login');
		}
	}

	function logout(){
		$this->login_model->delUserSessionId(array('session_id'=>$this->session->session_id,'id_user'=>$this->session->userdata('id_user')));
		$this->session->sess_destroy();
		redirect(WEB_URL.'login');
	}

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}

	function checkBrowser(){
		$this->load->library('user_agent');
		if ($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Unidentified User Agent';
		}
		return $agent;
		//echo $this->agent->platform();
	}

	function forgotPwd(){
		$this->load->view('forgot_pwd_view');
	}
//End
}
?>
