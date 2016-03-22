<?php

if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

class LoginControl
{
	public function __construct()
	{
		//if ($_REQUEST['act'] == 'Login')
		//require(BATH_PATH.'/view/login.php');
	}
	
	private function validate()
	{
		$username = $_REQUEST['user_name'];
		$userpwd = $_REQUEST['user_pwd'];
		require_once(BATH_PATH.'/model/admin.php');
		$model = new AdminModel();
		$key = $model -> getPwdFromName($username);
		if ($key == '')
			return false;
		if ($key == md5($userpwd))
			return true;
		else return false;
	}
	
	public function login()
	{
		$username = $_REQUEST['user_name'];
		if ($_SESSION["login"] == 'true')
		{
			$username = $_SESSION["membername"];
			require_once(BATH_PATH.'/model/admin.php');
			$model = new AdminModel();
			$admin = $model -> getInfoFromName($username);
			$type = strtolower($admin["admin_type"]);
			require(BATH_PATH.'/view/uiframe_'.$type.'.php');
		}
		else
		{
			if ($this -> validate())
			{
				$_SESSION["login"] = 'true';
				$_SESSION["membername"] = $username;
				/*print <<<HTML
				
				<meta http-equiv="refresh" content="0.1; url=http://121.42.211.188/badapple/admin/">
HTML;*/
				require_once(BATH_PATH.'/model/admin.php');
				$model = new AdminModel();
				$admin = $model -> getInfoFromName($username);
				$type = strtolower($admin["admin_type"]);
				require(BATH_PATH.'/view/uiframe_'.$type.'.php');
			}
			else
			{
				//echo "账号/密码错误";
				//登陆不成功
				require(BATH_PATH.'/view/login.php');
			}
		}
	}

	public function logout()
	{
		unset($_SESSION["login"]);
		unset($_SESSION["membername"]);
		header("Location: ./index.php?");
	}
}
		