<?php

/**
 * 系统日志
 *
 **/
 
 if (!@include(dirname(dirname(__FILE__)).'gobal.php')) exit('global.php isn\'t find!');
 
 /**
  * @ $message 日志信息
  * @ $module_id 记录模块
  * @ return type bool 日志是否成功
  **/
 function sLog($message, $module_id)
 {
	 require_once(ROOT_PATH.'util/db_manager.php');
	 $sql = "";
	 return dbManager :: getInstance() -> query($sql);
 }