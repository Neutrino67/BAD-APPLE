<?php

/**
 * ϵͳ��־
 *
 **/
 
 if (!@include(dirname(dirname(__FILE__)).'gobal.php')) exit('global.php isn\'t find!');
 
 /**
  * @ $message ��־��Ϣ
  * @ $module_id ��¼ģ��
  * @ return type bool ��־�Ƿ�ɹ�
  **/
 function sLog($message, $module_id)
 {
	 require_once(ROOT_PATH.'util/db_manager.php');
	 $sql = "";
	 return dbManager :: getInstance() -> query($sql);
 }