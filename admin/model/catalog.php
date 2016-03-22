<?php
 
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/util/db_manager.php');

class CatalogModel
{
	private $db;
	private $catalog;
	public function __construct()
	{
		$this -> db = dbManager :: getInstance();
		$this -> initCatalog();
	}
	
	public function __destruct()
	{
		$this -> db = null;
	}
	
	private function initCatalog()
	{
		$sql = "SELECT * 
				FROM goods_type";
		$result = $this -> db -> query($sql);
		//$this -> catalog = array();
		/*
		while ($row = $result -> fetch_assoc())
		{
			$father_id[] = $row["father_id"];
			$type_name[] = $row["type_name"];
		}
		$this -> catalog = array("father_id" => $father_id,
								 "type_name" => $type_name);
		*/
		while ($row = $result -> fetch_assoc())
		{
			$this -> catalog["father_id"][] = $row["father_id"];
			$this -> catalog["type_name"][] = $row["type_name"];
		}
	}

	public function getCatalogV($type)
	{
	 	$data = array();
	 	while ($type != -1)
	 	{
	 		array_unshift($data, $this -> catalog["type_name"][$type - 1]);
	 		$type = $this -> catalog["father_id"][$type - 1];
	 	}
	 	return $data;
	 }

	 public function getCatalogS($type)
	 {
	 	while ($type != -1)
	 	{
	 		$data = $this -> catalog["type_name"][$type - 1].">".$data;
	 		$type = $this -> catalog["father_id"][$type - 1];
	 	}
	 	return $data;
	 }

	 public function getTypeListByFatherId($id)
	 {
	 	$sql = "SELECT *
	 			FROM `goods_type`
	 			WHERE `father_id`='$id'";
	 	$data = $this -> db -> query($sql);
	 	while ($row = $data -> fetch_assoc())
	 	{
	 		$list[] = $row;
	 	}
	 	return $list;
	 }
}
