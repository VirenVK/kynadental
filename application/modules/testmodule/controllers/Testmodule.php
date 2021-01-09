<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 4/10/19
 * Time: 5:17 PM
 */
class Testmodule extends MY_Controller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		redirect(WEB_URL.'dashboard/index');
	}


//End
}
?>
