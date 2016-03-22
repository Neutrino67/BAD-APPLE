<?php
 
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');

class LogModel
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
	
	public function getInfoByPageNum($pagenum)
	{
		if ($pagenum <= 0) return array();
	 	$start = ($pagenum - 1) * 7;
	 	$num = 7;
	 	$sql = "SELECT * 
	 			FROM  `system_log`
	 			LIMIT $start, $num";
	 	$result = $this -> db -> query($sql);
		while ($row = $result -> fetch_assoc())
		{
			$data[] = $row;
		}
	 	return $data;
	 }

}
				