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
	商品管理
 </title>
</head>
<body>
	<div class="page">
		<div class="fixed-bar">
			<div class="item-title">
				<h3>商品</h3>
				<ul class="tab-base">
					<li>
						<a href="./index.php?act=Goods_manage&&op=getPage" class="current 1stpage" id="a1"><span>所有商品</span></a>
					</li>
					<li>
						<a href=# class="2ndpage" id="a2"><span>上架商品</span></a>
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
					<th class="w72th">商品编号</th>
					<th colspan="2">商品名称</th>
					<th class="w72th">商品分类</th>
					<th class="w72th">价格</th>
					<th class="w72th">库存</th>
					<th class="w72th">商品状态</th>
					<th class="w108th">相关操作</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once(BATH_PATH."/model/goods.php");
				require_once(BATH_PATH."/model/catalog.php");
				$model = new GoodsModel();
				$list = $model -> getGoodsByPageNum($pagenum);
				$item_num = count($list);
				$catalog_model = new CatalogModel();
				for ($i = 0; $i < $item_num; ++$i)
					{?>
						<tr class="goods_item">
							<td class="w72td">
								<input type="checkbox" name="id[]" value="<?php echo $list[$i]["id"]; ?> " class="checkitem" id="<?php echo "checkitem".$i; ?>">
							</td>
							<td class="w72td">
								<p><?php echo $list[$i]["id"] + 10000;?></p>
							</td>

							<td class="w60picture">
								<div class="thumb">
									<img src="" onload="javascript:DrawImage();">
								</div>
							</td>

							<td class="wxinfo">
								<dl class="goods_info">
									<dt class="goods_name">
										<?php echo $list[$i]["goods_name"]; ?>
									</dt>
									<dd class="goods_store">
										<?php echo $list[$i]["goods_produce"]; ?>
									</dd>
								</dl>
							</td>

							<td class="w72td">
								<p><?php echo $catalog_model -> getCatalogS($list[$i]["mid_type"]); ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["goods_price"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["goods_number"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["goods_status"]; ?></p>
							</td>

							<td class="w108td">
								<a href="javascript:void(0);">查看</a>
								&nbsp;|&nbsp;
								<a href="javascript:void(0);" onclick="delGood(<?php echo $list[$i]["id"]; ?>)">下架</a>
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
						<a href="javascript:void(0);" class="btn" onClick="delGoods();"><span>下架</span></a>
					</td>

					<td colspan="6">
						<div class="pagination">
							<ul>
								<li>
									<span>首页</span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Goods_manage&&op=getPage&&pagenum=".($pagenum - 1 >= 0 ? $pagenum - 1 : 0); ?>"><span>上一页</span></a>
								</li>

								<li>
									<span class="currentpage"><?php echo $pagenum >= 0 ? $pagenum : 0; ?></span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Goods_manage&&op=getPage&&pagenum=".($pagenum + 1); ?>"><span>下一页</span></a>
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
	<div class="2ndpage" style="display:none">
		<div class="show_box">
			<div class="show_detail" style="padding-top:50px;">
				<div class="show_title">&nbsp;商品名</div>
				<div class="show_text"><input type="text" id="goods_name"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;生产商</div>
				<div class="show_text"><input type="text" id="goods_produce"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;&nbsp;&nbsp;价格</div>
				<div class="show_text"><input type="text" id="goods_price"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;&nbsp;&nbsp;重量</div>
				<div class="show_text"><input type="text" id="goods_weight"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;&nbsp;&nbsp;数量</div>
				<div class="show_text"><input type="text" id="goods_num"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;&nbsp;&nbsp;分类</div>
				<div class="show_text">
					<?php 
						$top_type = $catalog_model -> getTypeListByFatherId(-1);
						echo "<select id=\"type_1\">";
								for ($i = 0; $i < count($top_type); ++$i) 
								{
									echo "<option class=\"op{$top_type[$i]['id']}\" value=\"{$top_type[$i]['id']}\">{$top_type[$i]['type_name']}</option>";
								}
						echo "</select>";
						echo "<select id=\"type_2\">";
						for ($i = 0; $i < count($top_type); ++$i)
						{
							$sec_type = $catalog_model -> getTypeListByFatherId($top_type[$i]['id']);
							for ($j = 0; $j < count($sec_type); ++$j)
							{
								echo "<option style=\"display:none\" value=\"{$sec_type[$j]['id']}\" class=\"op{$top_type[$i]['id']}\">{$sec_type[$j]['type_name']}</option>";
							}
						}
						echo "</select>";
					?>
				</div>
			</div>
			<div class="show_btn">
				<div style="margin-left:150px;"><input type="button" value="提交" onClick="javascript:b4_submit()"></div>
				<div><input type="button" value="取消"></div>
			</div>
		</div>

	</div>
	</div>		
</body>
<script>
	$("#type_1").change(function(){
		temp = $(this).prop("value");
		$("#type_2 option").hide();
		$(".op" + temp).show();
	})//有点BUG

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


	document.getElementById('goods_name').focus();

		function delGood(id){
				xmlHttp=GetXmlHttpObject();
				if (xmlHttp==null){
					alert ("Browser does not support HTTP Request");
					return;
				}
				data = id;
				var url="./index.php?act=Goods_manage&op=delGoods&id="+data+"&sid="+Math.random();
				xmlHttp.onreadystatechange=delStatus;
				xmlHttp.open("GET",url,true);
				xmlHttp.send(null);
			}

		function delGoods(){

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

			var url="./index.php?act=Goods_manage&op=delGoods&id="+data+"&sid="+Math.random();
			xmlHttp.onreadystatechange=delStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}

		function b4_submit(){

			goods_name = document.getElementById('goods_name').value;
			goods_produce = document.getElementById('goods_produce').value;
			goods_price = document.getElementById('goods_price').value;
			goods_weight = document.getElementById('goods_weight').value;
			goods_num = document.getElementById('goods_num').value;
			type_1 = document.getElementById('type_1').value;
			type_2 = document.getElementById('type_2').value;

			if((goods_name == "")||(goods_produce == "")||(goods_price == "")||(goods_weight == "")||(goods_num == "")||(type_1 == "")||(type_2 == "")){
				alert("不能留空！");
				return;
			}

			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null){
				alert ("Browser does not support HTTP Request");
				return;
			}

			var url="./index.php?act=Goods_manage&op=addGoods&goods_name=" + goods_name + "&goods_produce=" + goods_produce + 
					"&goods_price=" + goods_price + "&goods_weight=" + goods_weight + "&goods_num=" + goods_num + 
					"&top_type=" + type_1 + "&mid_type=" + type_2 + "&sid="+Math.random();
			xmlHttp.onreadystatechange=saveStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);

		}

		function saveStatus(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				x = xmlHttp.responseText;
				if (x == -1)
					alert("操作失败，请重试");
				if (x >= 0)
				{
					alert("操作成功!");
					location.href = "./index.php?act=Goods_manage&&op=getPage";
				}

			}
		}		

		function delStatus(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				x = xmlHttp.responseText;
				if (x == -1)
					alert("操作失败，请重试");
				if (x >= 0)
				{
					alert("操作成功!");
					location.href = "./index.php?act=Goods_manage&&op=getPage";
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