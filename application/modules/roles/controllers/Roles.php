<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 7/6/19
 * Time: 10:35 AM
 */
class Roles extends MY_Controller{
	 function __construct()
	 {
	 	parent::__construct(FALSE);
	 	$this->load->model('roles_model');
	 }
	 function index(){
	 	redirect(WEB_URL.'dashboard');
	 }

	 function allRoles(){
	 	$data = array();
		 $data['roles'] = $this->roles_model->getAllRoles();
		 $data['pvalue'] = array("view" =>"all_roles_view", "page_title" => "All Roles", "page_sub_title" => "All Roles");
		 $this->loadView($data);
	 }

	 function addRole(){
	 	 if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			 if ($this->form_validation->run('add_role') == TRUE) {
			 	 $_POST['id_user'] = $this->id_user;
				 $returnVal = $this->roles_model->addRoles($_POST);
				 $this->setSuccessFailMessage($returnVal);
				 if($returnVal['status']==STATUS_SUCCESS) {
				 	 $id_role = $returnVal['data']['id_role'];
					 $role_file_name = "menu_" . $id_role . ".json";
					 $menuVal['menu'] = $this->roles_model->getAllTopMenu($id_role);
					 $menuVal['allowsmenu'] = $this->roles_model->getRoleAccessMenus(array('id_role' => $id_role));
					 $this->writeJsonFile(array('file_name' => $role_file_name, 'json_data' => $menuVal));
					 $this->writeAllMenuJson();
				 }
				 redirect(WEB_URL.'roles/allRoles');
			 }
		 }
		 $this->load->model('department/department_model','department_model');
	 	 $data['department'] = $this->department_model->getDepartmentKeyValue(array('ps'=>''));
		 $data['menus'] = $this->roles_model->getAllMenu(array('id_user_type'=>$this->id_user_type));
		 $data['pvalue'] = array("view"=>"add_role_view","page_title" => "Add Role", "page_sub_title" => "Add Role");
		 $this->loadView($data);
	 }

	 function editRole(){
		 $id_roles = $this->uri->segment(3);
		 if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			 if ($this->form_validation->run('edit_role') == TRUE) {
				 $_POST['id_user'] = $this->id_user;
				 $returnVal = $this->roles_model->updateRoles($_POST);
				 $this->setSuccessFailMessage($returnVal);
				 if($returnVal['status']==STATUS_SUCCESS) {
					 $role_file_name = "menu_" . $_POST['id_role'] . ".json";
					 $menuVal['menu'] = $this->roles_model->getAllTopMenu($_POST['id_role']);
					 $menuVal['allowsmenu'] = $this->roles_model->getRoleAccessMenus(array('id_role' => $_POST['id_role']));
					 $this->writeJsonFile(array('file_name' => $role_file_name, 'json_data' => $menuVal));
					 $this->writeAllMenuJson();
				 }
				 redirect(WEB_URL.'roles/allRoles');
			 }
		 }
		 $this->load->model('department/department_model','department_model');
		 $data['department'] = $this->department_model->getDepartmentKeyValue(array('ps'=>''));
		 $data['row'] = $this->roles_model->getRoleDetails(array("id_roles"=>$id_roles));
		 $data['menu'] = $this->roles_model->getAllMenu(array('id_user_type'=>$this->id_user_type));
		 $data['row_roles'] = $this->roles_model->getRoles($id_roles);
		 $view = "edit_role_view";
		 $data['pvalue'] = array("page_title" => "Edit Role", "page_sub_title" => "Edit Role", "view" => $view);
		 $this->loadView($data);
	 }

	 function manageRole(){
		 $view = "edit_role_view";
		 $data['pvalue'] = array("page_title" => "Edit Role", "page_sub_title" => "Edit Role", "view" => $view);
		 $this->loadView($data);
	 }

	function writeAllMenuJson(){
	 	$result = $this->roles_model->getMenuList();
		$this->writeJsonFile(array('file_name' => "all_menu".".json", 'json_data' => $result));
		return TRUE;
	}
//End
}
?>
