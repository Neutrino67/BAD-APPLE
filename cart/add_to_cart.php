<?php 
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');  
require_once("mycart.php");

//�����Ự��ʼ
session_start();                       

//����Ƿ���й���¼
if(!isset($_SESSION["login_name"]) || ($_SESSION["login_name"]==""))
{
	header("Location: ROOT_PATH.'/login.php'");
}

$cart =& $_SESSION['cart']; // // $cart�Ƕ�$_SESSIONȫ�ֱ��������ã���$cart�����в������ǶԻỰ�Ĳ���
if(!is_object($cart)) $cart = new myCart();    //is_object �� �������Ƿ���һ������

//��������
if(isset($_POST["cartaction"]) && ($_POST["cartaction"]=="add"))
{
	$cart->add_item($_POST['id'],$_POST['qty'],$_POST['price'],$_POST['name']);
	header("Location: shopcart.php");
}

?>