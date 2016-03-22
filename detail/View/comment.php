<?php
session_start();
require_once('../Control/Detail_GoodsInfo_Controler.php');
$score=$_POST['score'];
$content=$_POST['content'];
$goodsId=$_POST['goods_id'];
//$userName=$_SESSION['user_name'];
$userId=$_SESSION['login_name'];

$dataContext=new GoodsInfoControler($goodsId);
$dataContext->AddComment($userId,$score,$content);
echo '添加成功';
?>