<?php

if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit("global.php isn\'t find!");
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

class Authority_manageControl
{
	public function getPage()
	{	
		require(BATH_PATH.'/view/authority_manage.php');
	}

	public function addAdmin()
	{
		if (isset($_GET["login_name"]) && $_GET["login_name"] != '')
		{
			$admin['login_name'] = $_GET["login_name"];
			$admin['login_pwd'] = md5($_GET["login_pwd"]);
			$admin['admin_name'] = $_GET["admin_name"];
			$admin['admin_type'] = $_GET["admin_type"];
			require_once(BATH_PATH."/model/admin.php");
			$model = new AdminModel();
			$model -> addAdmin($admin);
		}
	}

	public function delAdmin()
	{
		if (isset($_GET["id"]))
			$id = explode(",", $_GET["id"]);

		require_once(BATH_PATH."/model/admin.php");
		$model = new AdminModel();
		for ($i = 0; $i < count($id); ++$i)
		{
			$model -> delAdminById($id[$i]);
		}
	}
}
		
