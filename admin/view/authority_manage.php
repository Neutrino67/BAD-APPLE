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
	权限管理
 </title>
</head>
<body>
	<div class="page">
		<div class="fixed-bar">
			<div class="item-title">
				<h3>管理员</h3>
				<ul class="tab-base">
					<li>
						<a href="./index.php?act=Authority_manage&&op=getPage" class="current 1stpage" id="a1"><span>管理员列表</span></a>
					</li>
					<li>
						<a href=# class="2ndpage" id="a2"><span>添加成员</span></a>
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
					<th class="w72th">管理员ID</th>
					<!--th colspan="1"></th-->
					<th class="w72th">姓名</th>
					<th class="w108th">账号</th>
					<th class="w72th">权限组</th>
					<th class="w72th">账号类型</th>
					<th class="w108th">相关操作</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once(BATH_PATH."/model/admin.php");
				$model = new AdminModel();
				$list = $model -> getInfoByPageNum($pagenum);
				$item_num = count($list);
				for ($i = 0; $i < $item_num; ++$i)
					{?>
						<tr class="goods_item">
							<td class="w72td">
								<input type="checkbox" name="id[]" value="<?php echo $list[$i]["id"]; ?> " class="checkitem" id="<?php echo "checkitem".$i; ?>">
							</td>
							<td class="w72td">
								<p><?php echo $list[$i]["id"] + 10000;?></p>
							</td>
							<!--td colspan="1"></td-->
							<td class="w72td">
								<p><?php echo $list[$i]["admin_name"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["login_name"]; ?></p>
							</td>

							<td class="w72td">
								<p><?php echo "root" ?></p>
							</td>

							<td class="w72td">
								<p><?php echo $list[$i]["admin_type"]; ?></p>
							</td>

							<td class="w108td">
								<a href="javascript:void(0);">查看</a>
								&nbsp;|&nbsp;
								<a href="javascript:void(0);" onclick="delAdmin(<?php echo $list[$i]["id"]; ?>)">删除</a>
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
						<a href="javascript:void(0);" class="btn" onClick="delAdmins();"><span>删除</span></a>
					</td>

					<td colspan="6">
						<div class="pagination">
							<ul>
								<li>
									<span>首页</span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Authority_manage&&op=getPage&&pagenum=".($pagenum - 1 >= 0 ? $pagenum - 1 : 0); ?>"><span>上一页</span></a>
								</li>

								<li>
									<span class="currentpage"><?php echo $pagenum >= 0 ? $pagenum : 0; ?></span>
								</li>

								<li>
									<a href="<?php echo "./index.php?act=Authority_manage&&op=getPage&&pagenum=".($pagenum + 1); ?>"><span>下一页</span></a>
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
				<div class="show_title">&nbsp;&nbsp;账号</div>
				<div class="show_text"><input type="text" id="login_name"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;密码</div>
				<div class="show_text"><input type="text" id="login_pwd"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;确认</div>
				<div class="show_text"><input type="text" id="confirm"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;姓名</div>
				<div class="show_text"><input type="text" id="admin_name"></div>
			</div>
			<div class="show_detail">
				<div class="show_title">&nbsp;&nbsp;类型</div>
				<div class="show_text">
					<select id="type_1">
						<option value="D">数据管理员</option>
						<option value="B">业务管理员</option>
					</select>
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


	document.getElementById('login_name').focus();

		function delAdmin(id){
				xmlHttp=GetXmlHttpObject();
				if (xmlHttp==null){
					alert ("Browser does not support HTTP Request");
					return;
				}
				data = id;
				var url="./index.php?act=Authority_manage&op=delAdmin&id="+data+"&sid="+Math.random();
				xmlHttp.onreadystatechange=delStatus;
				xmlHttp.open("GET",url,true);
				xmlHttp.send(null);
			}

		function delAdmins(){

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

			var url="./index.php?act=Authority_manage&op=delAdmin&id="+data+"&sid="+Math.random();
			xmlHttp.onreadystatechange=delStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}

		function b4_submit(){

			login_name = document.getElementById('login_name').value;
			login_pwd = document.getElementById('login_pwd').value;
			confirm = document.getElementById('confirm').value;
			admin_name = document.getElementById('admin_name').value;
			type_1 = document.getElementById('type_1').value;

			if((login_name == "")||(login_pwd == "")||(confirm == "")||(admin_name == "")||(type_1 == "")){
				alert("不能留空！");
				return;
			}

			if (login_name != confirm)
			{
				alert("密码不一致！");
				return;
			}

			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null){
				alert ("Browser does not support HTTP Request");
				return;
			}

			var url="./index.php?act=Authority_manage&op=addAdmin&login_name=" + login_name + "&login_pwd=" + login_pwd + 
					"&admin_name=" + admin_name + "&admin_type=" + type_1 + "&sid="+Math.random();
			xmlHttp.onreadystatechange=saveStatus;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);

		}

		function saveStatus(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				x = xmlHttp.responseText;
				if (x == -1)
					alert("操作失败，请重试");
				else
				if (x >= 0)
				{
					if (x == 999)
					{
						alert("该账号已存在！");
						return;
					}
					else
					{
						alert("操作成功!");
						location.href = "./index.php?act=Authority_manage&&op=getPage";
					}
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
					location.href = "./index.php?act=Authority_manage&&op=getPage";
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