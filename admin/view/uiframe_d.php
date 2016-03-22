<?php
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
?>

<?php
	$user = $_SESSION["membername"];
	require_once(BATH_PATH.'/model/admin.php');
	$model = new AdminModel();
	$info = $model -> getInfoFromName($user);
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
	<link rel="stylesheet" href="./view/css/style.css">
	<title>
	BADAPPLE ADMIN
	</title>
	<script src="./view/css/jquery-1.10.1.js" type="text/javascript"></script>
</head>

<body style="min-width: 1200px; margin: 0px;">
<table style="width: 100%;" id="frametable" height="100%" width="100%" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
		<td height="45" class="mainhd">
			<div class="layout-header">
				<div class="title_img">
					<img src="./view/image/badapple.png">
				</div>
			</div>
		</td>
		<td class="mainhd">
			<div style="float:right; position:relative; right:50px; color:white;">
				<div>你好,<?php echo $info["admin_name"];?></div>
				<a href="./index.php?act=Login&op=logout" style="color:white;"><span>登出</span></a>
			</div>
		</td>
	</tr>

	<tr>
		<td class="menutd" valign="top" width="161">
			<div id="mainMenu" class="main-menu">
				<dl>
					<dd>
						<ol>
							<li>
								<a href="JavaScript:void(0);" name="welcome" id="welcome" onclick="openItem(this.id,'Welcome','getPage');" class="selected">欢迎页面</a>
							</li>

							<li>
								<a href="JavaScript:void(0);" name="order_manage" id="order_manage" onclick="openItem(this.id,'Authority_manage','getPage');">权限管理</a>
							</li>

							<li>
								<a href="JavaScript:void(0);" name="log_manage" id="log_manage" onclick="openItem(this.id,'Log_manage','getPage');">日志管理</a>
							</li>

							<li>
								<a href="JavaScript:void(0);" name="backup" id="backup" onclick="openItem(this.id, 'Backup', 'getPage');">数据备份</a>
							</li>
						</ol>
					</dd>
				</dl>	
			</div>
		</td>

		<td valign="top" width="100%">
			<iframe src="./index.php?act=Welcome&&op=getPage" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%" height="100%" scrolling="yes" onload="window.parent">
			#document
			</iframe>
		</td>	
	</tr>




</tbody>
</table>

</body>

<script>
	$(".main-menu a").hover(function(){
		if ($(this).prop("class") != "selected")
		{
			$(this).css("background-position", "-479px -142px");
			}
	}, function(){
		if ($(this).prop("class") != "selected")
		{
			$(this).css("background-position", "0px -170px");
			}
	})
	
	function openItem(id,act,op)
	{
		$(".main-menu a.selected").removeClass("selected");
		$('#'+id).removeAttr("style");
		$('#'+id).addClass('selected');
		src = './index.php?act='+act+'&&op='+op;
		$("#workspace").prop("src", src);
	}
</script>


</html>
