<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 22/7/19
 * Time: 11:28 AM
 */
class MY_Controller extends CI_Controller{
	public function __construct($arg=TRUE) {
		parent::__construct();
		if (!$this->checkUserLogin($this->session->userdata('id_user'))) {
			redirect(WEB_URL . 'login');
		}
		$this->id_user_role = $this->session->userdata('id_role');
		$this->id_user = $this->session->userdata('id_user');
		$this->id_user_type = $this->session->userdata('id_user_type');
		if(!$this->checkMethodAccess($arg)){
			redirect(WEB_URL.'dashboard/index');
		}
	}

	function checkUserLogin($id){
		if($id){
			return true;
		}
		return false;
	}

	function checkMethodAccess($arg=true){
		if($arg){
			$url_array = array();
			$url_array['controller'] = $this->uri->segment(1);
			$url_array['method'] = $this->uri->segment(2);
			$url_array['id_role'] = $this->session->userdata('id_role');
			return $this->checkModuleAccess($url_array);
		}
		return true;
	}
	function checkModuleAccess($url_array){
		$fileName = 'menu_'.$this->id_user_role.'.json';
		$arr = $this->readJsonFile(array('file_name'=>$fileName));
		$return_val = $arr['allowsmenu'];
		$url = $url_array['controller'].'/'.$url_array['method'];
		if (!array_key_exists($url, $return_val)) {
			/*Check in database menu is there or not
            if(Database have a value){
                then it don't have access
                redirect to Dashboard
            }else{
                allow to access the page
            }
            */
			$fileName = 'all_menu'.'.json';
			$arr = $this->readJsonFile(array('file_name'=>$fileName));
			if(array_key_exists($url, $arr)){
				/*Menu is there in database*/
				return FALSE;
			}else{
				return TRUE;
			}
		}
		return true;
	}

	/*Load View*/
	function loadView($data=array()){
		$fileName = 'menu_'.$this->id_user_role.'.json';
		$arr = $this->readJsonFile(array('file_name'=>$fileName));
		$data['accessMenu'] = $arr['menu'];
		$this->load->view('theme/main_view',$data);
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

	function writeJsonFile($postVal=array()){
		$filePath = ROOT_PATH.'jsnapps/'.$postVal['file_name'];
		$fp = fopen($filePath, 'w+');
		fwrite($fp, json_encode($postVal['json_data']));
		fclose($fp);
		return TRUE;
	}

	function readJsonFile($postVal=array()){
		$filePath = ROOT_PATH.'jsnapps/'.$postVal['file_name'];
		$string = file_get_contents($filePath);
		$jsonRS = json_decode ($string,true);
		return $jsonRS;
	}
//End
}
?>
