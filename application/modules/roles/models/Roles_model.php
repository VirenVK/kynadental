<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 24/10/18
 * Time: 12:02 PM
 */
class Roles_model extends MY_Model{
    function __construct()
    {
        parent::__construct();
    }

    function getAllRoles($postVal=array()){
        if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
            $result = 0;
        }else{
            $result = array();
        }
        $filed = "ur.*,d.name as dept_name";
        $this->db->select($filed);
        $this->db->from(TBL_ROLES.' ur');
        $this->db->join(TBL_DEPARTMENT.' d','ur.id_department=d.id_department','left');
        if(!empty($postVal)) {
            if(isset($postVal['user_type']) && $postVal['user_type']!=SUPER_ADMIN_USER_TYPE){
                $cond = 'ur.id_role!=1';
                $this->db->where($cond);
            }
            if(isset($postVal['name']) && (trim($postVal['name']) != '')) {
                $this->db->where('ur.role_name',trim($postVal['name']));
            }
        }
        $this->db->order_by('ur.role_name', 'ASC');
        /*For Pagination*/
        if(isset($postVal['query_type']) && $postVal['query_type']=="paggination"){ // For Pagination
            $pgArr = calculatePageNumber($postVal['page']);
            $this->db->limit($pgArr['n2'],$pgArr['n1']);
        }else if(isset($postVal['limited']) && ($postVal['limited'] > 0)){ // For Limited Records
            $this->db->limit($postVal['limited']);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            if(isset($postVal['query_type']) && $postVal['query_type']=="count"){
                $result = $query->num_rows();
            }else{
                $result = $query->result_array();
            }
        }
        return $result;
    }
    /*Add Roles*/
    function addRoles($postVal){
        $data = array("id_department"=>$postVal['id_department'],"role_name"=>$postVal['name'],'is_active'=>$postVal['is_active']);
        if($this->db->insert(TBL_ROLES,$data)) {
			$id_role = $this->db->insert_id();
			if (!empty($postVal['roles'])) {
				$this->addMenus($id_role, $postVal['roles']);
			}
			return array('status'=>STATUS_SUCCESS,'msg'=>'Role added successfully!','data'=>array('id_role'=>$id_role));
		}else{
			return array('status'=>STATUS_FAIL,'msg'=>PLEASE_TRY_AGAIN);
		}
    }
    /*Roles Details*/
    function getRoleDetails($postVal){
        $filed = "*";
        $this->db->select($filed);
        $where = array('ur.id_role'=>$postVal['id_roles']);
        $this->db->where($where);
        return $this->db->get(TBL_ROLES.' ur')->row_array();
    }
    /*Update Roles*/
    function updateRoles($postVal){
        $data = array("role_name"=>$postVal['name'],'is_active'=>$postVal['is_active']);
        $this->db->where("id_role",$postVal['id_role']);
        if($this->db->update(TBL_ROLES,$data)) {
			if (!empty($postVal['roles'])) {
				$this->addMenus($postVal['id_role'], $postVal['roles']);
			}
			return array('status'=>STATUS_SUCCESS,'msg'=>'Role updated successfully!');
		}else{
			return array('status'=>STATUS_FAIL,'msg'=>PLEASE_TRY_AGAIN);
		}
    }
    /** Get All Menu*/
    function getAllMenu($postVal=array()){
        $field = "m.id_menu, m.name, m.controller, m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $this->db->where('m.id_parent',0);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $sub_menu = $this->getSubMenu($val->id_menu);
                $results[] = array("id_menu"=>$val->id_menu,"name"=>$val->name,"controller"=>$val->controller, "method"=>$val->method,"sub_menu"=>$sub_menu);
            }
        }
        return $results;
    }
    /** All Sub menu*/
    function getSubMenu($id=0){
        $field = "m.id_menu,m.name, m.controller, m.method ";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $where = array("m.id_parent"=>$id);
        $this->db->where($where);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $menu_option = $this->getSubMenuOption($val->id_menu);
                $results[] = array("id_menu"=>$val->id_menu,"name"=>$val->name,"controller"=>$val->controller, "method"=>$val->method,"menu_option"=>$menu_option);
            }
        }
        return $results;
    }
    /** Sub Menu Option*/
    function getSubMenuOption($id=0){
        $field = "m.id_menu,m.name, m.controller, m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $where = array("m.id_parent"=>$id);
        $this->db->where($where);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $sub_menu_option = $this->getSubMenusOption($val->id_menu);
                $results[] = array("id_menu"=>$val->id_menu,"name"=>$val->name,"controller"=>$val->controller, "method"=>$val->method,"sub_menu_option"=>$sub_menu_option);
            }
        }
        return $results;
    }

    function getSubMenusOption($id=0){
        $field = "m.id_menu,m.name, m.controller, m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $where = array("m.id_parent > "=>0,"m.id_parent"=>$id);
        $this->db->where($where);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        $result = array();
        if($query->num_rows() > 0){
            $result = $query->result();
        }
        return $result;
    }
    /*Add Modules to role*/
    function addMenus($id_roles,$roles){
        $this->db->delete(TBL_MENU_PERMISSIONS, array('id_role' => $id_roles));
        if(!empty($roles)){
            foreach($roles as $k=>$x){
                $data[] = array("id_role"=>$id_roles,"id_menu"=>$x);
            }
        }
        if(!empty($data)) {
            $this->db->insert_batch(TBL_MENU_PERMISSIONS, $data);
        }
        return true;
    }
    /*Get Roles based on user type*/
    function getRoles($id_role){
        $field = "*";
        $this->db->select($field);
        $this->db->from(TBL_MENU_PERMISSIONS.' m');
        $this->db->where(array("id_role"=>$id_role));
        $query =  $this->db->get();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $results[$val->id_menu] = $val->id_menu;
            }
        }
        return $results;
    }
    /** Get Menu based on user type*/
    function getAllTopMenu($id_role){
        $field = "m.menu_icon,m.id_menu,m.name, m.controller, m.method ";
        $this->db->select($field);
        $this->db->from(TBL_MENU_PERMISSIONS.' mp');
        $this->db->join(TBL_MENU.' m', 'm.id_menu = mp.id_menu', 'left');
        $this->db->where(array('mp.id_role'=>$id_role,"m.id_parent"=>0,"m.display_status"=>'Y'));
        $this->db->order_by('m.display_orders','ASC');
        $results = array();
        $query =  $this->db->get();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $sub_menu = $this->getSubTopMenu($id_role,$val->id_menu);
                $results[] = array("id_menu"=>$val->id_menu,"name"=>$val->name,"controller"=>$val->controller, "method"=>$val->method,"menu_icon"=>$val->menu_icon,"sub_menu"=>$sub_menu);
            }
        }
        return $results;
    }
    /** Sub menu based on top menu */
    function getSubTopMenu($id_role,$id){
        $field = "m.menu_icon,m.id_menu,m.name,m.controller, m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU_PERMISSIONS.' mp');
        $this->db->join(TBL_MENU.' m', 'm.id_menu = mp.id_menu', 'left');
        $where = array("mp.id_role"=>$id_role,"m.id_parent"=>$id,"m.display_status"=>'Y');
        $this->db->where($where);
        //$this->db->order_by('m.id_menu', 'ASC');
        $this->db->order_by('m.display_orders','ASC');
        $query = $this->db->get();
        $results = array();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $sub_methods = $this->getAllSubMethods($val->id_menu);
                $results[] = array("id_menu"=>$val->id_menu,"name"=>$val->name,"controller"=>$val->controller, "method"=>$val->method,"menu_icon"=>$val->menu_icon,"sub_methods"=>$sub_methods);
            }
        }
        return $results;
    }
    function getAllSubMethods($id){
        $results = array();
        $field = "m.menu_icon,m.id_menu,m.name,m.controller, m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU_PERMISSIONS.' mp');
        $this->db->join(TBL_MENU.' m', 'm.id_menu = mp.id_menu', 'left');
        $where = array("m.id_parent"=>$id);
        $this->db->where($where);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach($query->result() as $val){
                $results[$val->method] = $val->method;
            }
        }
        return $results;
    }
    /*Get All access menus*/
    function getRoleAccessMenus($postVal=array()){
        $result = array();
        $field = "m.controller,m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU_PERMISSIONS.' mp');
        $this->db->join(TBL_MENU.' m','mp.id_menu = m.id_menu','left');
        $where = array('mp.id_role'=>$postVal['id_role']);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach($query->result_array() as $val){
                $url = $val['controller'].'/'.$val['method'];
                $result[$url] = $url;
            }
        }
        return $result;
    }
    /*Default menu access*/
    function getDefaultMenuAccess(){
        $result = array();
        $field = "m.controller,m.method";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $where = array("m.by_default_prmsn"=>1);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach($query->result_array() as $val){
                $url = $val['controller'].'/'.$val['method'];
                $result[$url] = $url;
            }
        }
        return $result;
    }

    function getModules($postVal=array()){
        $results = array();
        $field = "*";
        $this->db->select($field);
        $this->db->from(TBL_MENU.' m');
        $where = array("m.module_status " => 'Y');
        $this->db->where($where);
        $this->db->order_by('m.id_menu', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $results = $query->result_array();
        }
        return $results;
    }

    function getModulesDetails($postVal=array()){
        $filed = "*";
        $this->db->select($filed);
        $where = array('m.id_menu'=>$postVal['id_menu']);
        $this->db->where($where);
        return $this->db->get(TBL_MENU.' m')->row_array();
    }


	function getMenuList(){
		$result = array();
		$fields = "m.*";
		$this->db->select($fields);
		$this->db->from(TBL_MENU.' m');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$url = $val['controller'].'/'.$val['method'];
				$result[$url] = $url;
			}
		}
		return $result;
	}

//End
}
?>
