<?php
 
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');

class OrderModel
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

	public function getOrdersByPageNum($pagenum)
	{
		if ($pagenum <= 0) return array();
	 	$start = ($pagenum - 1) * 7;
	 	$num = 7;
	 	$sql = "SELECT * 
	 			FROM  `payment_info`
	 			LIMIT $start, $num";
	 	$result = $this -> db -> query($sql);
		while ($row = $result -> fetch_assoc())
		{
			$data[] = $row;
		}
	 	return $data;
	 }

	 public function delOrderById($id)
	 {
	 	$sql = "DELETE FROM `payment_info`
	 			WHERE `id`=$id";
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
	 }
}
