<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 28/10/19
 * Time: 2:34 PM
 */
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function getofficeForm(){
		if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
			$postVal=$_POST;
			$postVal['officeid']=1;
			$returnVal=$this->common_model->addPatient($postVal);
			$this->setSuccessFailMessage($returnVal);
			if($returnVal['status']==STATUS_SUCCESS) {
				redirect(WEB_URL . 'home/sucess?id=norwalkdentalcare');
			}else{
				redirect(WEB_URL . 'norwalkdentalcare');
			}
		}	
		$data['insurance']=$this->common_model->getAllInsurance();
		$data['insurance_plans']=$this->common_model->getAllInsurancePlan();
		$data['employers']=$this->common_model->getAllEmployers();
		$this->load->view('client/office-form',compact('data'));
	}

	function sucess()
	{	
		$this->load->view('client/sucess');
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

	function mypdf(){

		$this->load->library('pdf');

		$data=array();
	  	$html = $this->load->view('client/sucess',$data,true);
		//$html = $this->output->get_output();
		$this->pdf->generate($html,'CustomerInvoice');
   }
//End
}
?>
