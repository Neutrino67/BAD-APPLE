<?php
 
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');

class AdminModel
{
	private $db;
	public function __construct()
	{
		$this -> db = dbManager :: getInstance();
	}
	
	public function __destruct()
	{
		$this -> db = null;
	}
	
	public function getPwdFromName($username)
	{
		if (!isset($username))
			return '';
		$sql = "SELECT login_pwd 
				FROM admin_info
				WHERE login_name = '$username'";
		$result = $this -> db -> query($sql);
		if ($result == NULL)
			return '';
		else
			$result = $result -> fetch_assoc();
		return $result['login_pwd'];
	}

	public function getInfoFromName($username)
	{
		if (!isset($username))
			return '';
		$sql = "SELECT *
				FROM admin_info
				WHERE login_name = '$username'";
		$result = $this -> db -> query($sql);
		if ($result == NULL)
			return '';
		else
			$result = $result -> fetch_assoc();
		return $result;
	}

	public function getInfoByPageNum($pagenum)
	{
		if ($pagenum <= 0) return array();
	 	$start = ($pagenum - 1) * 7;
	 	$num = 7;
	 	$sql = "SELECT * 
	 			FROM  `admin_info`
	 			LIMIT $start, $num";
	 	$result = $this -> db -> query($sql);
		while ($row = $result -> fetch_assoc())
		{
			$data[] = $row;
		}
	 	return $data;
	 }

	 public function addAdmin($admin)
	 {
	 	$sql = "SELECT * FROM `admin_info` WHERE `login_name`='{$admin['login_name']}'";
	 	$data = $this -> db -> query($sql);
	 	if (count($data) > 1) 
	 	{
	 		echo '999';
	 		return;
	 	}
	 	$sql = "INSERT INTO `admin_info`
	 			(`id`, `login_name`, `login_pwd`, `admin_name`, `admin_type`)
	 			VALUES (NULL, '{$admin['login_name']}', '{$admin['login_pwd']}', '{$admin['admin_name']}', '{$admin['admin_type']}')";
		/*$sql = "INSERT INTO `tokyo`.`goods_info` (`id`, `goods_name`, `goods_price`, `goods_produce`, `goods_weight`, `goods_type`, `goods_number`, `goods_status`, `top_type`, `mid_type`) VALUES (NULL, 'qwe', '34', 'yuy', '66', '', '6666', '正常', '1', '2')";*/
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
	 }

	 public function delAdminById($id)
	 {
	 	$sql = "DELETE FROM `admin_info`
	 			WHERE `id`=$id";
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
	 }
}
				