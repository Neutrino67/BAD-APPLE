<?php

require_once "index_config.php";

$show_index = new Show_index;
$show_index->show_head('BadApple(伊甸园)');

echo <<<HTML

<div class="login">
	<div class="login_bg">
		<div class="login_title">请登入</div>
		<hr>
		<div class="login_title2">登入伊甸园</div>
		<div class="login_input" style="margin-top:20px;"><input type="text" id="login_name"></div>
		<div class="login_input"><input type="password" id="login_pwd"></div>
		<div class="login_btn" style="margin-top:20px;"><input type="button" value="登入" onClick="javascript:b4_submit()"></div>
		<div class="login_reg"><a href="reg.php">尚未拥有Bad ID？立刻加入。</a></div>
	</div>
</div>

<script>

	document.getElementById("login_name").focus();
	document.getElementById("login_pwd").onkeyup = keyEvent;

	function b4_submit(){
		x = document.getElementById("login_name").value;
		y = document.getElementById("login_pwd").value;

		if((x == "")||(y == "")){
			alert("不能留空！");
			return;
		}


		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null){
			alert ("Browser does not support HTTP Request");
			return;
		}

		var url="check.php?flag=login&x=" + x + "&y=" + y + "&sid="+Math.random();
		xmlHttp.onreadystatechange=saveStatus;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);

	}

	function saveStatus(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			x = xmlHttp.responseText;
			
			if(x == 1){
				alert('登录成功！');
				location.replace('http://121.42.211.188/badapple/index.php');
			}

			if(x == 0){
				alert('帐号或密码错误！');
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

HTML;

$show_index->show_foot();

?>