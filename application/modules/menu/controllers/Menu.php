<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 27/8/19
 * Time: 2:45 PM
 * Company & Company Code
 */
class Menu extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function addMenu(){
		$data = array();
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('add_menu') == TRUE) {
				$returnVal = $this->menu_model->addMenu($postVal);
				$this->setSuccessFailMessage($returnVal);
				if($returnVal['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'menu/allMenu');
				}
			}

		}
		$data['pvalue'] = array('view'=>'add_menu_view','title'=>'Add Menu',"page_sub_title" => "Add Menu");
		$this->loadView($data);
	}

	function allMenu(){
		$data['allMenu'] = $this->menu_model->getMenuList(array("id_parent"=>0));
		$data['pvalue'] = array("view" => "list_menu_view","title"=>"Menu","page_sub_title" => "Menu");
		$this->loadView($data);
	}

	function editMenu(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('edit_menu') == true){
				$result = $this->menu_model->updateMenu($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] = STATUS_SUCCESS){
					redirect(WEB_URL.'menu/allMenu');
				}
			}
		}
		$data['getMenu'] = $this->menu_model->getMenu(array('id_menu' => $id));
		$data['pvalue'] = array('view' => 'edit_menu_view','title' => 'Edit Menu', 'page_sub_title' => 'Edit Menu');
		$this->loadView($data);
	}

	function addSubMenu(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('add_submenu') == TRUE) {
				$returnVal = $this->menu_model->addSubMenu($postVal);
				$this->setSuccessFailMessage($returnVal);
				if($returnVal['status'] == STATUS_SUCCESS){
					redirect(WEB_URL.'menu/allMenu');
				}
			}

		}
		$data['getSubMenu'] = $this->menu_model->getMenu(array('id_menu' => $id));
		$data['pvalue'] = array( "view" => "add_submenu_view",'title'=>'Add Sub Menu',"page_sub_title" => "Add Sub Menu");
		$this->loadView($data);
	}

	function allSubMenu(){
		$data['allSubMenu'] = $this->menu_model->getSubMenuList();
		$data['pvalue'] = array('view' => 'list_submenu_view','title'=>'Sub Menu','page_sub_title' => 'Sub Menu');
		$this->loadView($data);
	}

	function getMenusAjax($id){
		$data['updateSubMenu'] = $this->menu_model->getSubMenuid(array('id_parent' => $id));
		$data['pvalue'] = array('title'=>'Update SubMenu',"page_sub_title" => "Update SubMenu");
		$this->load->view("update_submenu_view", $data);
	}

	function updateMenusAjax(){
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;	
			if($this->form_validation->run('edit_sub_menu') == true){
				$result = $this->menu_model->updateSubMenuAjax($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] = STATUS_SUCCESS){
					redirect(WEB_URL.'menu/allSubMenu');
				}
			}
		}else{
			echo "No sub menus";
		}
	}
	
	function editSubMenu(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			$postVal = $_POST;
			if($this->form_validation->run('edit_sub_menu') == true){
				$result = $this->menu_model->updateSubMenu($postVal);
				$this->setSuccessFailMessage($result);
				if($result['status'] = STATUS_SUCCESS){
					redirect(WEB_URL.'menu/allSubMenu');
				}
			}
		}
		$data['getSubMenu'] = $this->menu_model->getSubMenu(array('id_menu' => $id));
		$data['pvalue'] = array('view' => 'edit_sub_menu_view','title' => 'Edit Sub Menu', 'page_sub_title' => 'Edit Sub Menu');
		$this->loadView($data);
	}
//End
}
?>
