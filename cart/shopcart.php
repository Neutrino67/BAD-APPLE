<?php 
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');  
require_once("mycart.php");
require_once (ROOT_PATH.'/index_config.php');

//声明会话开始
   session_start();                       

//检查是否进行过登录
   if(!isset($_SESSION["login_name"]) || ($_SESSION["login_name"]==""))
   {
       header("Location:../login.php");
   }

$show_index = new Show_index;
$show_index->show_head('购物车-BadApple(伊甸园)');  //顶部菜单栏


$cart =& $_SESSION['cart']; // $cart是对$_SESSION全局变量的引用，对$cart的所有操作都是对会话的操作
if(!is_object($cart)) $cart = new myCart();    //is_object — 检测变量是否是一个对象，检查是否存在购物车，否则则创建

// 更新购物车内容
if(isset($_POST["cartaction"]) && ($_POST["cartaction"]=="update"))
{
  if(isset($_POST["updateid"]))
  {
    $i=count($_POST["updateid"]);
    for($j=0;$j<$i;$j++)
	{
      $cart->edit_item($_POST['updateid'][$j],$_POST['qty'][$j]);
    }
  }
}

// 移除购物车内容
if(isset($_GET["cartaction"]) && ($_GET["cartaction"]=="remove"))
{
  $removeid = intval($_GET['delid']);
  $cart->del_item($removeid);
}

// 清空购物车内容
if(isset($_GET["cartaction"]) && ($_GET["cartaction"]=="empty"))
{
  $cart->empty_cart();
}
?>
 
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
		<link href="http://121.42.211.188/badapple/cart/check.css" rel="stylesheet">
    </head>
    <body>
        <div class ="container" >
              <div class="check">
                  <div class="cart_items">
                    </br></br></br></br><h1>我的购物车</h1></br>
					<hr width="100%" size="1" /></br>
                      <td >
						<div class="normalDiv">
						  <?php 
						  if($cart->itemcount > 0) {?>
					  <form action="" method="post" name="cartform" id="cartform">
					    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF">
						  <tr>
							<th >刪除</th>
							<th >产品名称</th>
							<th >数量</th>
							<th >单价</th>
							<th >小计</th>
						  </tr>
							  <?php     
							  foreach($cart->get_contents() as $item) {
							  ?>              
						  <tr>
							<td align="center" bgcolor="#F6F6F6" class="tdbline"><p><a href="?cartaction=remove&delid=<?php echo $item['id'];?>">移除</a></p></td>
							<td bgcolor="#F6F6F6" class="tdbline"><p><?php echo $item['info'];?></p></td>
							<td align="center" bgcolor="#F6F6F6" class="tdbline"><p>
							  <input name="updateid[]" type="hidden" id="updateid[]" value="<?php echo $item['id'];?>">
							  <input name="qty[]" type="text" id="qty[]" value="<?php echo $item['qty'];?>" size="1">
							  </p>
							</td>
							<td align="center" bgcolor="#F6F6F6" class="tdbline"><p>$ <?php echo number_format($item['price']);?></p></td>
							<td align="center" bgcolor="#F6F6F6" class="tdbline"><p>$ <?php echo number_format($item['subtotal']);?></p></td>
						  </tr>
							<?php }?>
						  <tr>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>运费</p></td>
							<td valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>$ <?php echo number_format($cart->deliverfee);?></p></td>
						  </tr>
						  <tr>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>总计</p></td>
							<td valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p>&nbsp;</p></td>
							<td align="center" valign="baseline" bgcolor="#F6F6F6"><p class="redword">$ <?php echo number_format($cart->grandtotal);?></p></td>
						  </tr>          
						</table>
						<hr width="100%" size="1" /></br>
						<p align="center">
						  <input name="cartaction" type="hidden" id="cartaction" value="update">
						  <input type="submit" name="updatebtn" id="button3" style="width:100px; height:30px;" value="更新购物车">
						  <input type="button" name="emptybtn" id="button5"  style="width:100px; height:30px;" value="清空购物车" onClick="window.location.href='?cartaction=empty'">
						  <input type="button" name="button" id="button6" style="width:100px; height:30px;"  value="前往结帐" onClick="window.location.href='checkout.php';">
						  <input type="button" name="backbtn" id="button4" style="width:100px; height:30px;" value="回上一页" onClick="window.history.back();">
						</p></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
					  </form>
                    </div>          
                 <?php }else{ ?>
                  <div class="infoDiv"></br></br></br><h2>目前购物车是空的。</h2></div></br></br></br></br></br></br></br></br></br></br>
				   </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                 <?php } ?>
                   </td>
                </div>
            </div>
       </div>
    </body>
</html>
<?php $show_index->show_foot();?>