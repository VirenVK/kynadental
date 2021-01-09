<?php 
class Csclmng extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('csclmng_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard');
	}

	function addCountry(){
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('add_country') == true){
				$postVal = $_POST;
				$postVal['id_parent'] = 0;
				$postVal['country_level'] = 1;
				$result = $this->csclmng_model->addCscl($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'csclmng/allCountry');
				}
			}
		}
		$data['pvalue'] = array('view' => "add_country_view",'title' => 'Add Country');
		$this->loadView($data);
	}

	function addState(){
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('add_state') == true){
				$postVal = $_POST;
				$postVal['id_parent'] = $postVal['id_country'];
				$postVal['country_level'] = 2;
				$result = $this->csclmng_model->addCscl($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'csclmng/allState');
				}
			}
		}
		$data['cscs'] = $this->csclmng_model->getCsc(array('country_level' => 1));
		$data['pvalue'] = array('view' => 'add_state_view','title' => 'Add State');
		$this->loadView($data);
	}

	function addCity(){
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('add_city') == true){
				$postVal = $_POST;
				$postVal['id_parent'] = $postVal['id_state'];
				$postVal['country_level'] = 3;
				$result = $this->csclmng_model->addCscl($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'csclmng/allCity');
				}
			}
		}
		$data['cscs'] = $this->csclmng_model->getCsc(array('country_level' => 1));
		$data['pvalue'] = array('view'=>'add_city_view','title' => 'Add City');
		$this->loadView($data);
	}

	function addLocation(){
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			if($this->form_validation->run('add_location') == true){
				$postVal = $_POST;
				$postVal['id_parent'] = $postVal['id_city'];
				$postVal['country_level'] = 4;
				$result = $this->csclmng_model->addCscl($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'csclmng/allLocation');
				}
			}
		}
		$data['cscs'] = $this->csclmng_model->getCsc(array('country_level' => 1));
		$data['pvalue'] = array('view'=>'add_location_view','title' => 'Add Location');
		$this->loadView($data);
	}

	function ajaxGetState(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$id =  $this->input->get('id');
		$location = $this->csclmng_model->getCsc(array('country_level'=>2,'id_parent'=>$id));
		echo json_encode($location);
	}

	function ajaxGetCity(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		 $id =  $this->input->get('id');
		$location = $this->csclmng_model->getCsc(array('country_level'=>3,'id_parent'=>$id));
		echo json_encode($location);
	}

	function allCountry(){
		$postArr = array('country_level' => 1);
		$data['cscs'] = $this->csclmng_model->getCsc($postArr);
		$data['pvalue'] = array( 'view' => 'all_country_view','title' => 'All Countries');
		$this->loadView($data);
	}

	function allState(){
		$postArr = array('country_level' => 2);
		$data['cscs'] = $this->csclmng_model->getCsc($postArr);
		$data['pvalue'] = array('view' => 'all_state_view','title' => 'All State');
		$this->loadView($data);
	}

	function allCity(){
		$postArr = array('country_level' => 3);
		$data['cscs'] = $this->csclmng_model->getCsc($postArr);
		$data['pvalue'] = array('view' => 'all_city_view','title' => 'All City');
		$this->loadView($data);
	}

	function allLocation(){
		$postArr = array('country_level' => 4);
		$data['cscs'] = $this->csclmng_model->getCsc($postArr);
		$data['pvalue'] = array('view' => 'all_location_view','title' => 'All Location');
		$this->loadView($data);
	}
}
?>
