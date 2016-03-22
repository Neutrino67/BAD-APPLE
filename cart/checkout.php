<?php 
   if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t find!');  
   require_once("mycart.php");
   require_once (ROOT_PATH.'/index_config.php');
   require_once(ROOT_PATH.'/util/db_manager.php');
   
//声明会话开始
   session_start();                       

//检查是否进行过登录，未登录返回登陆界面
   if(!isset($_SESSION["login_name"]) || ($_SESSION["login_name"] == ""))
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
   
   $query = "SELECT * FROM `user_info` WHERE id = '$login_name'";
   $result = $db -> query($query);
   $row_result= mysqli_fetch_array($result);
   $_SESSION['username'] = $row_result["user_name"];
   

   $cart =& $_SESSION['cart']; // $cart是对$_SESSION全局变量的引用，对$cart的所有操作都是对会话的操作
   if(!is_object($cart)) $cart = new myCart();    //is_object — 检测变量是否是一个对象，检查是否存在购物车，否则则创建
 ?>
   <!DOCTYPE html>
   <html lang="zh-CN">
   <head><link href="http://121.42.211.188/badapple/cart/check.css" rel="stylesheet"></head>
   <body>
              <table width="1200" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF"> 
               <td>
                </br><div class="subjectDiv"><h1>购物结帐</h1></div></br>
				    <hr width="100%" size="1" /></br>
                  <div class="normalDiv">
                    <?php if($cart->itemcount > 0) {?>
                    <p class="heading"><h2>购物內容</h2></p>
                    <table width="100%" border="0" align="center" cellpadding="20" cellspacing="2">
                      <tr>
                        <th>编号</th>
                        <th>产品名称</th>
                        <th>数量</th>
                        <th>单价</th>
                        <th>小计</th>
                      </tr>
                      <?php       
						$i=0;
						foreach($cart->get_contents() as $item) {
						$i++;
                      ?>
                      <tr>
                        <td align="center" bgcolor="#F6F6F6" class="tdbline"><p><?php echo $i;?>.</p></td>
                        <td bgcolor="#F6F6F6" class="tdbline"><p><?php echo $item['info'];?></p></td>
                        <td align="center" bgcolor="#F6F6F6" class="tdbline"><p><?php echo $item['qty'];?></p></td>
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
                    </br><hr width="100%" size="1" /></br>
                    <p class="heading"><h2>收货信息</h2></p>
                    <form action="cartreport.php" method="post" name="cartform" id="cartform" onSubmit="return checkForm();">
                      <table width="90%" border="0" align="center" cellpadding="4" cellspacing="1">
                        <tr>
                          <th width="20%" bgcolor="#ECE1E1">姓名</th>
                          <td bgcolor="#F6F6F6"><p>
                              <?php echo $_SESSION['username'];?>
                              
                        </tr>
                        <tr>
                          <th width="20%" bgcolor="#ECE1E1">电话</th>
                          <td bgcolor="#F6F6F6"><p>
                              <?php echo "$customerphone";?>
                             
                        </tr>
						<tr>
                          <th width="20%" bgcolor="#ECE1E1">邮政编码</th>
                          <td bgcolor="#F6F6F6"><p>
                              <?php echo "$postcode";?>
                              
                        </tr>
                        <tr>
                          <th width="20%" bgcolor="#ECE1E1">收货地址</th>
                          <td bgcolor="#F6F6F6"><p>
                             <?php echo "$customeraddress";?>
                              
                        </tr>
						 <tr>
                          <th width="25%" bgcolor="#ECE1E1">配送方式</th>
                          <td bgcolor="#F6F6F6"><p>
                              <select name="delivertype" id="delivertype">
                                <option value="伊甸园快递" selected>伊甸园快递</option>
                                <option value="上门自提">上门自提</option>
                              </select>
                            </p></td>
                        </tr>
                        <tr>
                          <th width="20%" bgcolor="#ECE1E1">付款方式</th>
                          <td bgcolor="#F6F6F6"><p>
                              <select name="paytype" id="paytype"  >
                                <option value="在线支付" selected>在线支付</option>
                                <option value="分期付款">分期付款</option>
                                <option value="货到付款">货到付款</option>
                              </select>
                            </p></td>
                        </tr>
                      </table>
                      </br><hr width="100%" size="1" /></br>
                      <p align="center">
                        <input name="cartaction" type="hidden" id="cartaction" value="update">
                        <input type="submit" name="updatebtn" id="button3" style="width:100px; height:30px;" value="确定下单">
                        <input type="button" name="backbtn" id="button4"  style="width:100px; height:30px;" value="回上一页" onClick="window.history.back();">
						</br></br></br></br></br></br></br></br></br></br></br></br>
                      </p> 
                    </form>
                  </div>
                  <?php }else{ ?>
				  </br></br></br></br>
                  <div class="infoDiv"><h2>目前购物车是空的。</h2></div></br></br></br></br></br></br></br></br></br></br></br></br></br>
				  </br></br></br></br></br></br></br></br></br></br></br></br></br>
                  <?php } ?></td>
              </table>
   </body>
</html>
<?php $show_index->show_foot();?>
