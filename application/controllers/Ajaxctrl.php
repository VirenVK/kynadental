<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 28/10/19
 * Time: 2:34 PM
 */
class Ajaxctrl extends MY_Controller{
	function __construct(){
		parent::__construct(FALSE);
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function getLocation(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$id =  $this->input->get('id');
		$location = $this->common_model->getLocation(array('id_parent'=>$id));
		$html = "<option value=''>Please Select</option>";
		if(!empty($location)){
			foreach($location as $key=>$val){
				$html.="<option value='".$key."'>".$val."</option>";
			}
		}else{
			$html = "<option value=''>No Data</option>";
		}
		echo $html;
	}
//End
}
?>
