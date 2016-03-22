<?php

session_start();
error_reporting(0);

$flag = $_GET['flag'];

switch($flag){
	case 'login':
		$x = $_GET['x'];
		$y = $_GET['y'];

		$mysqli = new mysqli("localhost", "root", "", "tokyo");
		$mysqli->query("SET NAMES utf8");
		$sql = "select * from user_info where login_name=$x and login_pwd=$y";
		$result = $mysqli->query($sql);

		if($row = $result->fetch_array()){

			$_SESSION['login_name'] = $row['id'];
			$_SESSION['user_name'] = $row['user_name'];
			echo "1";
			
		}else{
			echo "0";
		}

		$result->free();
		$mysqli->close();
	break;

	case 'reg':
		$user_name = $_GET['user_name'];
		$reg_name = $_GET['reg_name'];
		$reg_pwd = $_GET['reg_pwd'];
		$address = $_GET['address'];
		$postcode = $_GET['postcode'];
		$phone = $_GET['phone'];
		$d = date("Y-m-d");

		$mysqli = new mysqli("localhost", "root", "", "tokyo");
		$mysqli->query("SET NAMES utf8");

		$sql = "select * from user_info where login_name=$reg_name";
		$result = $mysqli->query($sql);

		if($row = $result->fetch_array()){
			echo "00";
			break;
		}

		$sql = "INSERT INTO user_info(`login_name`, `login_pwd`, `user_name`, `reg_date`) VALUES ('$reg_name', '$reg_pwd', '$user_name', '$d')";
		$mysqli->query($sql);

		$user_id = $mysqli->insert_id;

		$sql = "INSERT INTO address_info(`user_id`, `user_address`, `postcode`, `phone`) VALUES ('$user_id', '$address', '$postcode', '$phone')";
		$mysqli->query($sql);

		echo $mysqli->affected_rows;

		$mysqli->close();
	break;

	case 'logout':

	session_destroy();
	echo "<script>location.replace('http://121.42.211.188/badapple/index.php');</script>";
	
	break;
}

?>