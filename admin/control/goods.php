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
		if ($pagenum <= 0) return array();
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

	 public function addGood($good)
	 {
	 	$sql = "INSERT INTO `goos_info`
	 			(`goods_name`, `goods_price`, `goods_produce`, `goods_weight`, `goods_number`, `goods_status`, `top_type`, `mid_type`)
	 			VALUES (`{$good['goods_name']}`, `{$good['goods_price']}`, `{$good['goods_produce']}`, `{$good['goods_weight']}`, `{$good['goods_number']}`, `{$good['goods_status']}`, `{$good['top_type']}`, `{$good['mid_type']}`)";
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
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