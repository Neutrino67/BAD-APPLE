<?php

/**
 * 数据库管理器
 *
 *
 ***/
 if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');

 class dbManager
 {
	private $connect;
	private	static $instance = null;
	private function __construct()
	{
		$config = require_once(ROOT_CONFIG_PATH.'/db_config.php');
		$this -> connect = new mysqli($config['host'], $config['user'], $config['pwd'], $config['mydb']);
		$this -> connect -> query("SET NAMES utf8");
	}
	
	function __destruct()
	{
		$this -> connect -> close();
	}
	
	private function __clone(){}

	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new dbManager();
		}
		return self::$instance;
	}
	
	public function query($sql)
	{
        return $this -> connect -> query($sql);
    }
	
	public function opState()
	{
		return $this -> connect -> affected_rows;
	}
	
	public function getInsertId()
	{
		return mysql_insert_id($this -> connect);
	}
}
?>