 <?php
	
	if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');
	require_once(ROOT_PATH.'/util/db_manager.php');
	
	//echo ROOT_PATH.'/util/db_manager.php';
/*
	$db = dbManager :: getInstance();
	$db -> query("INSERT INTO aa (test1, test2) VALUE (11, 12)");
	echo 'OK!';
	*/
	require(ROOT_PATH.'/admin/view/login.php');
	echo md5('123');

	