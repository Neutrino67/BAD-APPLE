<?php
 
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');

class GoodsModel
{
	private $db;
	private $catalog;
	public function __construct()
	{
		$this -> db = dbManager :: getInstance();
	}
	
	public function __destruct()
	{
		$this -> db = null;
	}

	public function getGoodsByPageNum($pagenum)
	{
	 	$start = ($pagenum - 1) * 7;
	 	$num = 7;
	 	$sql = "SELECT * 
	 			FROM  `goods_info`
	 			LIMIT $start, $num";
	 	$result = $this -> db -> query($sql);
		while ($row = $result -> fetch_assoc())
		{
			$data[] = $row;
		}
	 	return $data;
	 }

}

/*
//test
$model = new GoodsModel();
$data = $model -> getGoodsByPageNum(1);
for ($i = 0; $i < 7; ++$i)
{
	print_r($data[$i]);
	echo "</br>";
}
*/