<?php 
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');  
require_once("mycart.php");

//声明会话开始
session_start();                       

//检查是否进行过登录
if(!isset($_SESSION["login_name"]) || ($_SESSION["login_name"]==""))
{
	header("Location: ROOT_PATH.'/login.php'");
}

$cart =& $_SESSION['cart']; // // $cart是对$_SESSION全局变量的引用，对$cart的所有操作都是对会话的操作
if(!is_object($cart)) $cart = new myCart();    //is_object — 检测变量是否是一个对象

//立即购买
if(isset($_POST["cartaction"]) && ($_POST["cartaction"]=="purse"))
{
	$cart->add_item($_POST['id'],$_POST['qty'],$_POST['price'],$_POST['name']);
	header("Location: checkout.php");
}

?>

