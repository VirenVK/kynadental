<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 6/9/19
 * Time: 1:51 PM
 */
class Master extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function mData(){
		$mcode = isset($_GET['mcode'])?$_GET['mcode']:'';
		$pageData = $this->getPageInfo(array('mcode'=>$mcode));
		$data['mcode'] = $mcode;
		$data['results'] = $this->master_model->getMasterData(array('master_code'=>$mcode));
		$data['pvalue'] = array("page_title" => $pageData['page_name'],
			"page_sub_title" => $pageData['page_name'],
			"view" => "master_view",
			"back_url"=>$pageData['back_url']
		);
		$this->loadView($data);
	}

	function addMaster(){
		$mcode = isset($_GET['mcode'])?$_GET['mcode']:'';
		$pageData = $this->getPageInfo(array('mcode'=>$mcode));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			$postVal = $_POST;
			if($this->form_validation->run('add_master') == TRUE) {
			$postVal['master_code'] = $mcode;
			$returnVal = $this->master_model->addMasterData($postVal);
			$this->setSuccessFailMessage($returnVal);
			redirect(WEB_URL.$pageData['back_url']);
		}
	}
		$data['mcode'] = $mcode;
		$data['pvalue'] = array("page_title" => "Add ".$pageData['page_name'],
			"page_sub_title" => "Add ".$pageData['page_name'],
			"view" => "master_add_view",
			"back_url"=>$pageData['back_url']
			);
		$this->loadView($data);
	}

	function editMaster(){
		$mcode = isset($_GET['mcode'])?$_GET['mcode']:'';
		$id = isset($_GET['id'])?$_GET['id']:0;
		$pageData = $this->getPageInfo(array('mcode'=>$mcode));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			$postVal = $_POST;
			if($this->form_validation->run('edit_master') == TRUE) {
			$returnVal = $this->master_model->updateMasterData($postVal);
			$this->setSuccessFailMessage($returnVal);
			redirect(WEB_URL.'master/mData?mcode='.$mcode);
		}
	}
		$data['rows'] = $this->master_model->getMasterDataDetails(array('id_master_data'=>$id));
		$data['pvalue'] = array("page_title" => "Edit ".$pageData['page_name'],
			"page_sub_title" => "Edit ".$pageData['page_name'],
			"view" => "master_edit_view",
			"back_url"=>$pageData['back_url']
			);
		$this->loadView($data);
	}

	function getPageInfo($postVal=array()){
		switch($postVal['mcode']){
			case 'LANGUAGE':
				$resultArr = array('page_name'=>'Language','back_url'=>'master/mData?mcode=LANGUAGE');
				break;
			case 'CURRENCY':
				$resultArr = array('page_name'=>'Currency','back_url'=>'master/mData?mcode=CURRENCY');
				break;
			case 'TYPECMPNY':
				$resultArr = array('page_name'=>'Type of company','back_url'=>'master/mData?mcode=TYPECMPNY');
				break;
			case 'STATUS':
				$resultArr = array('page_name'=>'Records Status','back_url'=>'master/mData?mcode=STATUS');
				break;
			case 'PRDINDCTR':
				$resultArr = array('page_name'=>'Period Indicator','back_url'=>'master/mData?mcode=PRDINDCTR');
				break;
			case 'SUB_PERIOD':
				$resultArr = array('page_name'=>'Sub Period','back_url'=>'master/mData?mcode=SUB_PERIOD');
				break;
			case 'ACCOUNT_LEVEL':
				$resultArr = array('page_name'=>'Account Level','back_url'=>'master/mData?mcode=ACCOUNT_LEVEL');
				break;
			case 'ACCOUNT_TYPE':
				$resultArr = array('page_name'=>'Account Type','back_url'=>'master/mData?mcode=ACCOUNT_TYPE');
				break;
			case 'PRDSTATUS':
				$resultArr = array('page_name'=>'Period Status','back_url'=>'master/mData?mcode=PRDSTATUS');
				break;
			case 'PROPCAT':
				$resultArr = array('page_name'=>'Property Category','back_url'=>'master/mData?mcode=PROPCAT');
				break;
			default:
				$resultArr = array('page_name'=>'Dashboard','back_url'=>'dashboard/index');
		}
		return $resultArr;
	}
//End
}
?>
