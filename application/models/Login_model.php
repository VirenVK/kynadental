<?php
/**
 * Created by IntelliJ IDEA.
 * User: deepak
 * Date: 13/5/19
 * Time: 2:19 PM
 */
class Login_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function checkLogin($postVal=array()){
		if(isset($postVal['username']) && isset($postVal['password'])){
			$fields = "ul.ci_session_id,ul.id_user,ul.is_active as is_login_active,u.id_user_type,u.id_role,u.first_name,u.last_name,u.user_icon,u.email,u.phone,u.is_active,u.is_employee";
			$this->db->select($fields);
			$this->db->from(TBL_LOGIN.' ul');
			$this->db->join(TBL_USERS.' u','u.id_user=ul.id_user','left');
			$where = array('ul.username'=>trim($postVal['username']),'ul.password'=>md5($postVal['password']));
			$this->db->where($where);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$row = $query->row_array();
				if($row['is_login_active']='Y'){
					return array('status'=>STATUS_SUCCESS,'msg'=>STATUS_SUCCESS,'data'=>$row);
				}else{
					return array('status'=>STATUS_FAIL,'msg'=>'Please contact to customer care');
				}
			}
			return array('status'=>STATUS_FAIL,'msg'=>'Please provide correct username and password');
		}
		return array('status'=>STATUS_FAIL,'msg'=>PLEASE_TRY_AGAIN_MSG);
	}

	function addLoginTime($postVal=array()){
		if(FALSE && !empty($postVal) && isset($postVal['id_user']) && $postVal['id_user'] > 0){
			$ip_address = '127.0.0.1';
			if(isset($postVal['ip_address'])){
				$ip_address = $postVal['ip_address'];
			}
			$logic_source = "other";
			if(isset($postVal['logic_source'])){
				$logic_source = $postVal['logic_source'];
			}
			$data = array("ip_address"=>$ip_address,
				"id_user"=>$postVal['id_user'],
				"logic_source"=>$logic_source,
				"log_time"=>getCurrentDateTime());
			$this->db->insert(TBL_USERS_LOGIN_HISTORY,$data);
			$lgData = array("last_login"=>getCurrentDateTime());
			$this->db->where('id_user',$postVal['id_user']);
			$this->db->update(TBL_LOGIN,$lgData);
		}
		return true;
	}

	function logOutFromOldSessionId($postVal=array()){
		if(!empty($postVal) && isset($postVal['id_user'])){
			if($this->delUserSessionId(array('session_id'=>$postVal['ci_session_id'],'id_user'=>$postVal['id_user']))){
				$log_status = array('login_out_time' => date('Y-m-d H:i:s'),'ci_session_id' => $postVal['user_ci_session_id'],'login_status' => 'ONLINE');
				$this->db->where('id_user',$postVal['id_user']);
				$this->db->update(TBL_LOGIN,$log_status);
				return true;
			}
		}
		return true;
	}

	function delUserSessionId($postVal=array()){
		if(!empty($postVal) && isset($postVal['session_id']) && isset($postVal['id_user']) && $postVal['id_user'] > 0){
			$log_status = array('login_out_time' => date('Y-m-d H:i:s'),'ci_session_id' =>'','login_status' => 'OFFLINE');
			$this->db->where('id_user',$postVal['id_user']);
			$this->db->update(TBL_LOGIN,$log_status);
			$this->db->where('id', $postVal['session_id']);
			$this->db->delete('ci_sessions');
			return true;
		}
		return true;
	}
//End
}
?>
