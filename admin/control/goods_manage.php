<?php

if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit("global.php isn\'t find!");
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

class Goods_manageControl
{
	public function getPage()
	{	
		require(BATH_PATH.'/view/goods_manage.php');
	}

	public function addGoods()
	{
		if (isset($_GET["goods_name"]) && $_GET["goods_name"] != '')
		{
			$good['goods_name'] = $_GET["goods_name"];
			$good['goods_price'] = $_GET["goods_price"];
			$good['goods_produce'] = $_GET["goods_produce"];
			$good['goods_weight'] = $_GET["goods_weight"];
			$good['goods_number'] = $_GET["goods_num"];
			$good['goods_status'] = "正常";
			$good['top_type'] = $_GET["top_type"];
			$good['mid_type'] = $_GET["mid_type"];
			require_once(BATH_PATH."/model/goods.php");
			$model = new GoodsModel();
			$model -> addGood($good);
		}
	}

	public function delGoods()
	{
		if (isset($_GET["id"]))
			$id = explode(",", $_GET["id"]);

		require_once(BATH_PATH."/model/goods.php");
		$model = new GoodsModel();
		for ($i = 0; $i < count($id); ++$i)
		{
			$model -> delGoodById($id[$i]);
		}
	}
}
		
