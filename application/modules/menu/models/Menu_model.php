<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 27/8/19
 * Time: 2:47 PM
 */
class Menu_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addMenu($postVal=array()){
		$data = array(
			'name'				=> $postVal['name'],
			'help_name'			=> $postVal['help_name'],
			'controller'		=> $postVal['controller'],
			'method'			=> $postVal['method'],
			'id_parent'			=> $postVal['id_parent'],
			'level'				=> $postVal['level'],
			'display_orders'	=> $postVal['display_orders'],
			'menu_icon'			=> $postVal['menu_icon']
		);
		if($this->db->insert(TBL_MENU,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Menu Added Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Failed to add.');
	}

	function getMenuList($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$this->db->where('m.id_parent',$postVal['id_parent']);
		$this->db->order_by('m.display_orders','ASC');
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->result_array();
		}
		return $result;
	}

	function getMenu($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$where = array('id_menu' => $postVal['id_menu']);
		$this->db->where($where);
		$this->db->order_by('m.display_orders','ASC');
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->row_array();
		}
		return $result;
	}

	function updateMenu($postVal = array()){
		$data = array(
			'name'				=> $postVal['name'],
			'help_name'			=> $postVal['help_name'],
			'controller'		=> $postVal['controller'],
			'method'			=> $postVal['method'],
			'id_parent'			=> $postVal['id_parent'],
			'level'				=> $postVal['level'],
			'display_orders'	=> $postVal['display_orders'],
			'menu_icon'			=> $postVal['menu_icon']
		);
		$this->db->where('id_menu', $postVal['id_menu']);
		if($this->db->update(TBL_MENU, $data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Menu Updated Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Failed to update');
	}

	function addSubMenu($postVal = array()){
		$data = array(
			'name'				=> $postVal['name'],
			'help_name'			=> $postVal['help_name'],
			'controller'		=> $postVal['controller'],
			'method'			=> $postVal['method'],
			'id_parent'			=> $postVal['id_parent'],
			'level'				=> $postVal['level'],
			'display_orders'	=> $postVal['display_orders'],
			'menu_icon'			=> $postVal['menu_icon']
		);
		if($this->db->insert(TBL_MENU,$data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Sub Menu Added Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Failed to add.');
	}

	function getSubMenu($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$where = array('id_menu' => $postVal['id_menu']);
		$this->db->where($where);
		$this->db->order_by('m.display_orders','ASC');
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->row_array();
		}
		return $result;
	}

	function updateSubMenu($postVal = array()){
		$data = array(
			'name'				=> $postVal['name'],
			'help_name'			=> $postVal['help_name'],
			'controller'		=> $postVal['controller'],
			'method'			=> $postVal['method'],
			'id_parent'			=> $postVal['id_parent'],
			'level'				=> $postVal['level'],
			'display_orders'	=> $postVal['display_orders'],
			'menu_icon'			=> $postVal['menu_icon']
		);

		$this->db->where('id_menu', $postVal['id_menu']);
		if($this->db->update(TBL_MENU, $data)){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Sub Menu Updated Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Failed to update');
	}

	function updateSubMenuAjax($postVal = array()){
		$name = $postVal['menuName'];
		$display_orders = $postVal['orderNumber'];
		$id_menu = $postVal['menuid'];

		for($i=0; $i<sizeof($id_menu); $i++){		
			$data[] = array(
				'name'				=> $name[$i],
				'display_orders'	=> $display_orders[$i],
				'id_menu'           => $id_menu[$i]
			);
		}
		//print_r($data); exit;
		if($this->db->update_batch(TBL_MENU, $data, 'id_menu')){
			return array('status'=>STATUS_SUCCESS,'msg'=>'Sub Menu Updated Successfully.');
		}
		return array('status'=>STATUS_FAIL,'msg'=>'Nothing to Update');
	}

	function getSubMenuList(){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$where = array('id_parent' => 0);
		$this->db->where($where);
		$this->db->order_by('m.display_orders','ASC');
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->result_array();
		}
		return $result;
	}

	function getSubMenuid($postVal=array()){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$where = array('id_parent' => $postVal['id_parent']);
		$this->db->where($where);
		$this->db->order_by('m.display_orders','ASC');
		$q =  $this->db->get();
		if($q->num_rows() > 0){
			$result = $q->result_array();
		}
		return $result;
	}
//End
}
?>
