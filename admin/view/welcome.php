<?php
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
?>

<?php
	$username = $_SESSION["membername"];
	require_once(BATH_PATH.'/model/admin.php');
	$model = new AdminModel();
	$admin = $model -> getInfoFromName($username);
	$type = strtolower($admin["admin_type"]);
?>
<html>
<head>
 <title>
	欢迎页面
 </title>
</head>
<body>
	<img src="<?php echo './view/image/admin_'.$type.'.jpg';?>" width=100% height=100% position=absolute left=0>
	</img>		
</body>
</html>