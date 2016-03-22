<?php
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
?>

<?php
	$pagenum = 1;
	if(isset($_REQUEST["pagenum"]))
	{
		$pagenum = $_REQUEST["pagenum"];
	}
?>

<html>
<head>
 <meta charset="UTF-8">
 <script type="text/javascript" src="./view/css/jquery-1.10.1.js"></script>
 <link rel="stylesheet" type="text/css" href="./view/css/pagestyle.css">
 <title>
	订单管理
 </title>
</head>
<body>
	<div class="page">
		<div class="fixed-bar">
			<div class="item-title">
				<h3>订单</h3>
				<ul class="tab-base">
					<li>
						<a href="./index.php?act=Order_manage&&op=getPage" class="current 1stpage" id="a1"><span>所有订单</span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="fixed-empty"></div>
		<div class="1stpage">
		<form method="post" id="form_goods" action="">
		<table class="goods_table">
			<thead>
				<tr class="thead">
					<th class="w72th"></th>
					<th class="w72th">订单编号</th>
					<th colspan="2">订单内容</th>
					<th class="w72th">折扣率</th>
					<th class="w72th">总价</th>
					<th class="w72th">日期</th>
					<th class="w72th">订单状态</th>
					<th class="w108th">相关操作</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once(BATH_PATH."/model/order.php");
				require_once(BATH_PATH."/model/goods.php");
				$model = new OrderModel();
				$list = $model -> getOrdersByPageNum($pagenum);
				$item_num = count($list);
				$good_model = new GoodsModel();
				for ($i = 0; $i < $item_num; ++$i)
					{?>
						<tr class="goods_item">
							<td class="w72td">
								<input type="checkbox" name="id[]" value="<?php echo $list[$i]["id"]; ?> " class="checkitem" id="<?php echo "checkitem".$i; ?>">
							</td>
							<td class="w72td">
								<p><?php echo $list[$i]["id"] + 201330600;?></p>
							</td>

							<td class="w60picture">
								<div class="thumb">
									<img src="" onload="javascript:DrawImage();">
								</div>
							</td>

							<td class="wxinfo">
								<dl class="goods_info">
									<dt class="goods_name">
										<?php echo $good_model -> getGoodsNameByIdList(explode(',', $list[$i]["goods_id"])); ?>
									</dt>
									<dd class="goods_store">
										<?php echo $list[$i]["deliver_type"]; ?>
									</dd>
								</dl>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["payment_discount"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["payment_price"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["generate_date"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["status"]; ?></p>
							</td>

							<td class="w108td">
								<a href="javascript:void(0);">查看</a>
								&nbsp;|&nbsp;
								<a href="javascript:void(0);" onclick="delOrder(<?php echo $list[$i]["id"]; ?>)">删除</a>
							</td>
						</tr>
				<?php }?>
			</tbody>
			<tfoot>
				<tr class="tfoot">
					<td class="w72td">
						<input type="checkbox" class="checkall" id="checkallBottom">
					</td>

					<td style="position:relative; left:-20px;">
						<label for="checkallBottom">全选</label>
					</td>

					<td colspan="2">
						<a href="javascript:void(0);" class="btn" onClick="delOrders();"><span>删除</span></a>
					</td>

					<td colspan="6">
						<div class="pagination">
							<ul>
								<li>
									<span>首页</span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Order_manage&&op=getPage&&pagenum=".($pagenum - 1 >= 0 ? $pagenum - 1 : 0); ?>"><span>上一页</span></a>
								</li>

								<li>
									<span class="currentpage"><?php echo $pagenum >= 0 ? $pagenum : 0; ?></span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Order_manage&&op=getPage&&pagenum=".($pagenum + 1); ?>"><span>下一页</span></a>
								</li>

								<li>
									<span>末页</span>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
	</div>		
</body>
<script>
	$(".checkall").change(function(){
		if ($(".checkall").prop("checked")){
			$(".checkitem").prop("checked", 'true');
		}else{
			$(".checkitem").removeAttr("checked");
		}
	});

	$(".tab-base a").click(function(){
		if ($(this).hasClass("current")) return;
		for (var i = 1; i <= 2; i++)
		{
			if ($("#a" + i).hasClass("current"))
			{
				$("#a" + i).removeClass("current");
				var classname = $("#a" + i).prop("class");
				$("div." + classname).css("display", 'none');
			}else{
				var classname = $("#a" + i).prop("class");
				$("div." + classname).css("display", 'block');
				$("#a" + i).addClass("current");
			}
		}
	}
		)



		function delOrder(id){
				xmlHttp=GetXmlHttpObject();
				if (xmlHttp==null){
					alert ("Browser does not support HTTP Request");
					return;
				}
				data = id;
				var url="./index.php?act=Order_manage&op=delOrders&id="+data+"&sid="+Math.random();
				xmlHttp.onreadystatechange=delStatus;
				xmlHttp.open("GET",url,true);
				xmlHttp.send(null);
			}

		function delOrders(){

			item_num = <?php echo $item_num;?>;
			var data = "";
			for (var i = 0; i < item_num; i++)
			{
				if ($("#checkitem" + i).prop("checked"))
				{
					data = data + $("#checkitem" + i).prop("value");
					data = data + ',';
				}
			}
			data = data.substring(0, data.length-1);
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null){
				alert ("Browser does not support HTTP Request");
				return;
			}

			var url="./index.php?act=Order_manage&op=delOrders&id="+data+"&sid="+Math.random();
			xmlHttp.onreadystatechange=delStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}

		function delStatus(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				x = xmlHttp.responseText;
				if (x == -1)
					alert("操作失败，请重试");
				if (x >= 0)
				{
					alert("操作成功!");
					location.href = "./index.php?act=Order_manage&&op=getPage";
				}
			}
		}		

		function GetXmlHttpObject(){
			var xmlHttp=null;
			try{
				xmlHttp=new XMLHttpRequest();
			}catch (e){
				try{
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				}catch (e){
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			}

			return xmlHttp;
		}
</script>
</html>