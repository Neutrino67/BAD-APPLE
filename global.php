<?php
/**
 *全局文件
 *
 *包括全局预定义常量
 *和路径配置
 ***/
 
 //error_reporting(E_ALL & ~E_NOTICE);
 
 define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));
 define('ROOT_CONFIG_PATH', str_replace('\\', '/', dirname(__FILE__).'/config'));