<?php 
     if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');  
	 require_once("mycart.php");
     require_once (ROOT_PATH.'/index_config.php');
	 require_once(ROOT_PATH.'/util/db_manager.php');

//声明会话开始
     session_start();                       

//检查是否进行过登录
     if(!isset($_SESSION["login_name"]) || ($_SESSION["login_name"]==""))
	 {
	   header("Location: ROOT_PATH.'/login.php'");
     }
	 $login_name = $_SESSION["login_name"];
//顶部菜单栏
     $show_index = new Show_index;
     $show_index -> show_head('购物车-BadApple(伊甸园)');  
     
	 $db = dbManager :: getInstance();//连接数据库

//获取用户的电话、地址、邮政编码和用户名并存储
	 $sql_query = "SELECT * FROM `address_info` WHERE user_id = '$login_name'";
	 $result = $db -> query($sql_query);
	 $row_result= mysqli_fetch_array($result);
	 $customerphone = $row_result["phone"];
	 $customeraddress = $row_result["user_address"];
	 $postcode = $row_result["postcode"];
	 
     $cart =& $_SESSION['cart']; // $cart是对$_SESSION全局变量的引用，对$cart的所有操作都是对会话的操作
     if(!is_object($cart)) $cart = new myCart();    //is_object — 检测变量是否是一个对象，检查是否存在购物车，否则则创建

//获取当前日期
     date_default_timezone_set("PRC");
     $generate_date = date("Y-m-d");
	 
//获取商品编号
     foreach($cart->get_contents() as $item)
	 {
		 $itemtemple = $item['id'];
		 $goods_id .= "$itemtemple,";
	 }
	 $goods_id = substr($goods_id,0,strlen($goods_id)-1);

//新增订单资料
     $sql_query = "INSERT INTO `payment_info` (`id`,`user_id`,`goods_id`,`goods_number`,`payment_price` ,`payment_discount` ,`payment_type` ,`deliver_type`,`generate_date`,`status`,`deliverfee` ) VALUES (";
     $sql_query .= "NULL,";
	 $sql_query .= "'".$_SESSION["login_name"]."',";
	 $sql_query .= "'".$goods_id."',";
	 $sql_query .= $cart -> itemcount.",";
     $sql_query .= $cart -> grandtotal.",";
     $sql_query .= "0,";
     $sql_query .= "'".$_POST["paytype"]."',";
     $sql_query .= "'".$_POST["delivertype"]."',";
	 $sql_query .= "'".$generate_date."',";
	 $sql_query .= "'送货中',";
	 $sql_query .= $cart->deliverfee.")";
     $db->query($sql_query);

//减少库存量
     if($cart->itemcount > 0) 
	 {
		foreach($cart->get_contents() as $item) 
		{
		   $itemtem_id = $item['id'];
		   $itemtem_qty = $item['qty'];
		   $sql_query = "UPDATE goods_info SET goods_number = goods_number - '$itemtem_qty' WHERE id = '$itemtem_id'";
		   $db->query($sql_query);
		} 
	 }
	 

     $cpaytype = $_POST["paytype"];
     $total = $cart->grandtotal;
     $cart->empty_cart();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>订单反馈</title>
	 <link href="http://121.42.211.188/badapple/cart/check.css" rel="stylesheet">
 </head>
 <body>
	 </br><h1>购物清单</h1></br>
	 <hr width="100%" size="1" /></br>
	 <pre align="center" >
	亲爱的 <?php  echo $_SESSION['username']?> 您好：
		 
	感谢您的光临
	本次消费详细资料如下：
	

	
	--------------------------------------------------
    客戶姓名：<?php  echo $_SESSION['username']?> 
    电话： <?php  echo "$customerphone"?> 
    邮编： <?php  echo "$postcode" ?>                  
    送货地址： <?php  echo"$customeraddress"?>  
    付款方式： <?php  echo"$cpaytype "?> 
    消费金额：   <?php  echo"$total "?> 
	--------------------------------------------------
	

	
	希望能再次为您服务 
			
	BadApple-伊甸园 敬上
	 </pre>
     <p align="center">
	 <input type="button" name="button" id="button7" style="width:100px; height:30px;"  value="确定" onClick="window.location.href='./shopcart.php';">
	 </p></br></br></br></br>
 </body>
 </html>
 <?php
      $show_index->show_foot();
 ?>
