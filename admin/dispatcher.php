<?php
define('BATH_PATH', str_replace('\\', '/', dirname(__FILE__)));
/**
 * 调度器 请求入口点
 *
 *
 */

final class dispatcher
{
	public static function init()
	{
		session_start();
	}
	
	private static function control()
	{
		if (!isset($_GET['act']))
		{
			$act = 'Login';
			$op = 'login';
		}
		else
		{	
			$act = $_GET['act'];
			$op = $_GET['op'];
		}
		
		$actfile = BATH_PATH.'/control/'.strtolower($act).'.php';
		$classname = $act.'Control';

		
		if (!@include($actfile))
		{
			echo $actfile;
			echo 'actfilenotfound';
			exit();
		}
		
		if (class_exists($classname))
		{
			$myclass = new $classname();
		    $function = $op;
			if (method_exists($myclass, $function))
			{
				$myclass -> $function();
			}
			else
			{
				echo 'nosuchfunction';
				echo $function;
				exit();
			}
		}
		else 
		{
			echo $classname;
			echo 'nosuchclass';
		}
	}
	
	public static function run()
	{
		self :: init();
		self :: control();
	}
}
		