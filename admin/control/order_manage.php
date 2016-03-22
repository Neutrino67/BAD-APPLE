<?php

if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit("global.php isn\'t find!");
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

class Order_manageControl
{
	public function getPage()
	{	
		require(BATH_PATH.'/view/order_manage.php');
	}

	public function delOrders()
	{
		if (isset($_GET["id"]))
			$id = explode(",", $_GET["id"]);

		require_once(BATH_PATH."/model/order.php");
		$model = new OrderModel();
		for ($i = 0; $i < count($id); ++$i)
		{
			$model -> delOrderById($id[$i]);
		}
	}
}
		
