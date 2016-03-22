<?php
if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
require_once('../Control/Detail_GoodsInfo_Controler.php');
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

<head>
  <meta charset="UTF-8">
	<title><?php echo $goodsInfo->GetGoods()->title ?></title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import myDetail css-->
	<link type="text/css" rel="stylesheet" href="css/detail_style.css" media="screen,projection"/>
   <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.deep_purple-pink.min.css" /> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
</head>

<body >

  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!--script type="text/javascript" src="js/material.min.js"></script-->
      <!--script src="js/jquery-1.10.1.js" type="text/javascript"></script-->

<div class="row">
<div id="con" class="col s10 push-s1">
  <?php
    require_once "../Control/detail_config.php";
    $show_detail=new Show_Detail();
    echo $show_detail->show_head();
  ?>
  <!-- headpic----------------------------------------->
  <script>
    $(document).ready(function(){
      $('.parallax').parallax();
    });
    </script>
  <div class="parallax-container">
    <div class="parallax"><img src="pic/test1.jpg" style="display:block"></div>
  </div>
  <!-- headpic----------------------------------------->
  
  <!-- sec----------------------------------------->
  <div class="section white">
    <div id="mainrow" class="row">
      
      <div id="s_header">
        <p class="flow-text">BadApple</p>
      </div>
      <div id="mainContent" class="row">
        <!-- l----------------------------------------->
        <div id="sidebar" class="col s5">
          
          <?php
          $goods_pic=$goodsInfo->GetGoods()->pic;
          echo "
          <img src=\"../../../$goods_pic\" width=\"auto\" height=\"500\"/>
          ";
          ?>
          
        </div>
        <!-- l----------------------------------------->
        <!-- r----------------------------------------->
        <div id="content" class=“col s7”>
          
          <div class="fl v4-ginfor">
              <h2 ><?php echo $goodsInfo->GetTitle(); ?></h2>
              <p class="v4-ginfor-description">
	              <a href="../../index.php" target="_blank">#Bad Apple#</a>
	              <span><?php echo $goodsInfo->GetGoods()->content; ?></span>
              </p>
             <div class="v4-pricetag-box">
	            <div class="v4-pricetag">
		            ￥<?php echo $goodsInfo->GetGoods()->price; ?>															
				        <div class="v4-pricetag-info fr">
			            <span>评价&nbsp;&nbsp;<?php echo $goodsInfo->GetGoods()->score; ?></span>
			            <span>销量&nbsp;&nbsp;<?php echo $goodsInfo->GetGoods()->sold; ?></span>
		            </div>
	            </div>
	            <div class="v4-activity clear">
			          <div class="v4-key">
				          [满减]12月25日 00点结束&nbsp品质生活·满￥199至￥399减￥40; 满￥399减￥100
				        </div>
				        <div class="v4-key">
			            [包邮]满￥299免邮费
		            </div>
	            </div>
             </div>
             <div class="row">
           <div id="title_typ" class="v4-key">
	           款式
           </div>
           <div id="value_typ">
             <ul id="dropdown2" class="dropdown-content">
                <li><a href="#!">one<span class="badge">1</span></a></li>
                <li><a href="#!">two<span class="new badge">1</span></a></li>
                <li><a href="#!">three</a></li>
             </ul>
             <a class="btn dropdown-button" href="#!" id="btn_typ" data-activates="dropdown2">款式<i class="mdi-navigation-arrow-drop-down right"></i></a>
           </div>
           </div>
           <div class="row">
           <div id="title_num"  class="v4-key">
	           数量
           </div>
           <script language="JavaScript">
           function add(){
             var item= $('#pamount');
             var orig=Number(item.val());
             item.val(orig+1);
           }
           function reduce(){
             var item= $('#pamount');
             var orig=Number(item.val());
             if(orig>1){
               item.val(orig-1);
             }
           }
           function cheakIsNum(){
             var item = $('#pamount');
             var orig=Number(item.val());
             if(isNaN(orig)){
               item.val(1);
             }
           }
           </script>
           <div id="value_num" class=\"v4-value\">
	           <div class="shuliang">
		            <a href="javascript:void(0)" onclick="reduce()" class="minus">-</a>
                <input style="width:20px;" name="qty" onkeyup="cheakIsNum()" value="1" id="pamount">
                <a href="javascript:void(0)" onclick="add()" class="add">+</a><span></span>
                <form id="addToCartForm" name="form_cart" method="post" action="">
                  <input id="hidden_num" type="hidden" name="qty" value=1 />
		              <input id="goodsId" type="hidden" name="id" value=<?php echo $goodsInfo->GetGoods()->id; ?> />
                  <input type="hidden" name="price" value=<?php echo $goodsInfo->GetGoods()->price; ?> />
                  <input type="hidden" name="name" value=<?php echo $goodsInfo->GetGoods()->title; ?> />
                  <input id="hidden_action" type="hidden" name="cartaction" value=""/>
                  <input id=login_token type="hidden" name="isLogin" value="<?php echo $isLogin; ?>"/>
                </form>
	           </div>
           </div>
           </div>
  <div class="row">
  <a id="car" href="javascript:SubmitCart()" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>加入购物车</a>
  <a id="buy" href="javascript:SubmitPurse()" class="waves-effect waves-light btn">立即购买</a>
  <script language="JavaScript">
    function SubmitCart(){
             var isLogin = $('#login_token');
             var loginValue=Number(isLogin.val());
             if(loginValue==1)
             {
                 var item_num = $('#pamount');
                 var orig=Number(item_num.val());
                 var item_hiddenNum=$('#hidden_num');
                 item_hiddenNum.val(orig);
                 var item_hiddenAction=$('#hidden_action');
                 item_hiddenAction.val("add");
                 
                 document.form_cart.action="../../cart/add_to_cart.php";
                 document.getElementById('addToCartForm').submit();
             }
             else{
               window.location.href="../../login.php";
             }
             
           }
     function SubmitPurse(){
           var isLogin = $('#login_token');
           var loginValue=Number(isLogin.val());
           if(loginValue==1)
           {
               var item_num = $('#pamount');
               var orig=Number(item_num.val());
               var item_hiddenNum=$('#hidden_num');
               item_hiddenNum.val(orig);
               var item_hiddenAction=$('#hidden_action');
               item_hiddenAction.val("purse");
                 
               document.form_cart.action="../../cart/purse.php";
               document.getElementById('addToCartForm').submit();
           }
           else{
             window.location.href="../../login.php";
           }
         }
  </script>
  <!--/form-->
  </div>
  <img id="pic_sure" src="pic/sure.png"></img>
</div>
<!-- r----------------------------------------->
          
        </div>
      </div>
<!-- other_info----------------------------------------->
      <div id="other_info">
        <ul class="tabs">
          <li class="tab col s6"><a href="#test1">商品详细信息</a></li>
          <li class="tab col s6"><a class="active" href="#test2">买家评论</a></li>
          <!--li class="tab col s3 "><a href="#test3">Test 3</a></li>
          <li class="tab col s3"><a href="#test4">Test 4</a></li-->
        </ul>
      </div>
      <div id="test1" class="col s12">Test1</div>
      
      <div id="test2" class="col s12">
        <div class="v4-product-appraise-rate">
				<p class="socre">
					<strong>评价：</strong>
										<!--span class="score-box rate5"></span-->
					<span>&nbsp;&nbsp;<?php echo $goodsInfo->GetGoods()->score; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;（共<?php echo count($goodsInfo->GetGoods()->comments); ?>条评价）
									</p>
			</div>
      
      <div id=comment class="col s12">
      <?php
        $HTML_comments="";
        for($i=0;$i<count($goodsInfo->GetGoods()->comments);$i++)
        {
          $c_user=$goodsInfo->GetGoods()->comments[$i]->user;
          $c_score=$goodsInfo->GetGoods()->comments[$i]->score;
          $c_content=$goodsInfo->GetGoods()->comments[$i]->content;
          $HTML_comments.=
          "
          <div class=\"comment\">
            <!--div class=\"img\"><img src=\"pic/1-150.jpg\"></div-->
            <div class=\"img\"><img src=\"http://d05.res.meilishuo.net/ap/a/5f/6f/c7c233539da7b7b1d7e8e89ac967_200_200.cf.jpg\"></div>
            
            <div class=\"c_conent\">
              <div class=\"name\">$c_user&nbsp;&nbsp;$c_score</div>
              <div class=\"content\">$c_content</div>
            </div>
          </div>
          ";
        }
        echo $HTML_comments;
      ?>
      <Script language="JavaScript">
        $(document).ready(function() {
          $('select').material_select();
        });
      </Script>
    <div class="comment">
     <ul class="collapsible popout" data-collapsible="accordion">
      <li>
       <div class="collapsible-header"><i class="material-icons">whatshot</i>添加你的评论</div>
       <div class="collapsible-body">
        
        <div class="input-field col s12 m3">
         <select id="select_gmb" class="icons">
          <option value="" disabled selected>您的评价</option>
          <option value=5 data-icon="http://d05.res.meilishuo.net/ap/a/5f/6f/c7c233539da7b7b1d7e8e89ac967_200_200.cf.jpg" class="left circle">好</option>
          <option value=3 data-icon="http://d05.res.meilishuo.net/ap/a/5f/6f/c7c233539da7b7b1d7e8e89ac967_200_200.cf.jpg" class="left circle">中</option>
          <option value=1 data-icon="http://d05.res.meilishuo.net/ap/a/5f/6f/c7c233539da7b7b1d7e8e89ac967_200_200.cf.jpg" class="left circle">差</option>
         </select>
         <label>觉得商品怎么样？</label>
        </div>
        <div class="input-field col s1 offset-s8">
         <a href="javascript:SubmitComment()" id="c_send" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <p>
         <div class="row">
           <div class="input-field col s12">
             <i class="material-icons prefix">mode_edit</i>
             <textarea id="textarea" class="materialize-textarea" length="120" value=""></textarea>
             <label for="textarea">评论</label>
           </div>
         </div>
       </p>
      </div>
     </li>
    </ul>
   </div>
  <Script language="JavaScript">
     var xmlHttp;
     function SubmitComment(){
      var goods_id = $('#goodsId');
      var goodsValue=Number(goods_id.val());
      var currSelectValue = document.getElementById('select_gmb').value;
      if(currSelectValue=="") currSelectValue=5;
      var text = document.getElementById('textarea').value;
      if(text=="")
      {
        Materialize.toast('亲，请输入您的评价哦～', 4000);
      }
      else{
        sendCommentRequest_POST(goodsValue,currSelectValue,text);
      }
    }
    function createXMLHttpRequest(){
      if(window.XMLHttpRequest){
        xmlHttp=new XMLHttpRequest();
      }
      else{
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
    function sendCommentRequest_POST(goods,score,content){
      $.post("comment.php", { goods_id: goods, score: score, content: content },
        function(data){
          Materialize.toast(data, 30000);
      });
    }
   </Script>
  
  
      </div>
      </div>
    <!-- other----------------------------------------->
    </div>
  </div>
  <!-- sec----------------------------------------->
  <!-- footpic----------------------------------------->
  <!--div class="parallax-container">
    <div class="parallax"><img src="pic/d2.jpg" style="display:block" ></div>
  </div-->
  <?php
     $show_detail->show_foot();
  ?>
  <!-- footpic----------------------------------------->
  
</div>
</div>