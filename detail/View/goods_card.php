<?php
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once(ROOT_PATH.'/detail/Control/Detail_GoodsInfo_Controler.php');
if(!isset($_GET['goods_id']))
{
  header("Location: goods_erro.php"); 
  exit;
}
$goods_id=$_GET['goods_id'];
$goodsInfo=new GoodsInfoControler($goods_id);
if(!$goodsInfo->isAccess())
{
  header("Location: goods_erro.php"); 
  exit;
}

session_start();
$isLogin=0;
if(!isset($_SESSION["login_name"])||$_SESSION["login_name"]==0)
{
  $isLogin=0;
}
else{
  $isLogin=1;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
  <meta charset="UTF-8">
	<title><?php 
  if($goodsInfo->isAccess()==0){
      header("Location: goods_erro.php"); exit;}
  else echo $goodsInfo->GetTitle();
   ?></title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import myDetail css-->
	<link type="text/css" rel="stylesheet" href="css/detail_style.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
  <!--link type="text/css" rel="stylesheet" href="css/material.min.css"/-->
  
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body >
  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!--script type="text/javascript" src="js/material.min.js"></script-->


<div class="row">
  <div class="col s4 push-s4">
  <div id="detail_card" class="card">
    
      <div class="card-image waves-effect waves-block waves-light" height="450px">
        <img id="card_img" class="activator" src="../../../<?php echo $goodsInfo->GetGoods()->pic;?>" height="450px">
      </div>

      <div class="card-content" height="150px">
        <span id="card_title" class="card-title activator grey-text text-darken-4"><?php echo $goodsInfo->GetTitle();?><i class="material-icons right">more_vert</i></span>
        <p id="card_price">￥<?php echo $goodsInfo->GetGoods()->price;?></p>
          <div class="fixed-action-btn horizontal" style="bottom: 20px; right: 20px;">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
              <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
              <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
              <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
          </div>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4"><?php echo $goodsInfo->GetTitle();?><i class="material-icons right">close</i></span>
        <p><?php echo $goodsInfo->GetGoods()->content;?></p>
        <a href="javascript:SubmitPurse()" id="buy_index" class="waves-effect waves-light btn">立即购买</a>
        <a id="buy_index" href="detail.php?goods_id=<?php echo $goods_id; ?>" class="waves-effect waves-light btn">详细信息</a>
      </div>
      
    <form id="addToCartForm" name="form_cart" method="post" action="../../cart/purse.php">
                  <input id="hidden_num" type="hidden" name="qty" value=1 />
		              <input type="hidden" name="id" value=<?php echo $goodsInfo->GetGoods()->id; ?> />
                  <input type="hidden" name="price" value=<?php echo $goodsInfo->GetGoods()->price; ?> />
                  <input type="hidden" name="name" value=<?php echo $goodsInfo->GetGoods()->title; ?> />
                  <input type="hidden" name="cartaction" value="purse"/>
                  <input id=login_token type="hidden" name="isLogin" value="<?php echo $isLogin; ?>"/>
    </form>
    <script language="JavaScript">
    function SubmitPurse(){
             var isLogin = $('#login_token');
             var loginValue=Number(isLogin.val());
             if(loginValue==1)
             {
                 document.getElementById('addToCartForm').submit();
             }
             else{
               window.location.href ="../../login.php";
             }
           }
  </script>
      
  </div>
  </div>
</div>
</body>
</html>