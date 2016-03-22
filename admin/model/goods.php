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
	 	$sql = "INSERT INTO `goods_info`
	 			(`id`, `goods_name`, `goods_price`, `goods_produce`, `goods_weight`, `goods_type`, `goods_number`, `goods_status`, `top_type`, `mid_type`)
	 			VALUES (NULL, '{$good['goods_name']}', '{$good['goods_price']}', '{$good['goods_produce']}', '{$good['goods_weight']}', '', '{$good['goods_number']}', 
	 				'{$good['goods_status']}', '{$good['top_type']}', '{$good['mid_type']}')";
		/*$sql = "INSERT INTO `tokyo`.`goods_info` (`id`, `goods_name`, `goods_price`, `goods_produce`, `goods_weight`, `goods_type`, `goods_number`, `goods_status`, `top_type`, `mid_type`) VALUES (NULL, 'qwe', '34', 'yuy', '66', '', '6666', '正常', '1', '2')";*/
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
	 }

	 public function delGoodById($id)
	 {
	 	$sql = "DELETE FROM `goods_info`
	 			WHERE `id`=$id";
	 	$this -> db -> query($sql);
	 	echo $this -> db -> opState();
	 }

	 public function getGoodsNameByIdList($list)
	 {
	 	foreach ($list as $id) 
	 	{
	 		$sql = "SELECT `goods_name`
	 				FROM `goods_info`
	 				WHERE `id`='$id'";
	 		$result = $this -> db -> query($sql) -> fetch_assoc();
	 		$data .= $result['goods_name'].",";
	 	}
	 	$data = substr($data, 0, strlen($data) - 1);
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