<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:17 PM
 */
class Inbox extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}

	function inboxList(){
		$data['pvalue'] = array('view' => 'list_view', 'title' => 'Inbox','page_sub_title' => 'Inbox');
		$this->loadView($data);
	}
	function inboxDetail(){
		$data['pvalue'] = array('view' => 'inbox_detail_view', 'title' => 'Inbox Detail','page_sub_title' => 'Inbox Detail');
		$this->loadView($data);
	}

//End
}
?>
