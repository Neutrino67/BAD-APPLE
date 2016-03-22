<?php

require_once "index_config.php";

$show_index = new Show_index;
$show_index->show_head('BadApple(伊甸园)');

echo <<<HTML

<div class="reg_box">
	<div class="reg_title">建立您的Bad ID</div><hr>
	<div class="reg_detail">
		<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp姓名</div>
		<div><input type="text" style="width:100px;" id="user_name"></div>
	</div>
	<div class="reg_detail">
		<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp帐号</div>
		<div><input type="text" style="width:200px;" id="reg_name"></div>
	</div>
	<div class="reg_detail">
		<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp密码</div>
		<div><input type="password" style="width:200px;" id="reg_pwd"></div>
	</div>
	<div class="reg_detail">
		<div>确认密码</div>
		<div><input type="password" style="width:200px;" id="reg_pwd2"></div>
	</div>
	<div class="reg_detail">
		<div>联系地址</div>
		<div><input type="text" id="address"></div>
	</div>
	<div class="reg_detail">
		<div>邮政编码</div>
		<div><input type="text" style="width:100px;" id="postcode"></div>
	</div>
	<div class="reg_detail">
		<div>电话号码</div>
		<div><input type="text" style="width:200px;" id="phone"></div>
	</div>
	<div class="reg_detail">
		<div></div>
	</div>
	<div>
		<div><input type="button" id="reg_btn" value="提交" onClick="javascript:b4_submit()"></div>
	</div>
</div>

<script>
	
	document.getElementById('postcode').onkeyup = keyEvent;
	document.getElementById('phone').onkeyup = keyEvent;

	function keyEvent(){

		var key = event.keyCode;

		if((key >= 48)&&(key <= 57)){
		}else{
			switch (key) {
				case 8:
				case 9:
				case 13:
				case 16:
				case 17:
				case 18:
				case 20:
				case 27:
				case 91:
				break;

				default:
					document.getElementById('postcode').value = "";
					document.getElementById('phone').value = "";
					alert('不能输入非法字符！');
					return;
				break;
			}
		}

	}

	function b4_submit(){

		user_name = document.getElementById('user_name').value;
		reg_name = document.getElementById('reg_name').value;
		reg_pwd = document.getElementById('reg_pwd').value;
		reg_pwd2 = document.getElementById('reg_pwd2').value;
		address = document.getElementById('address').value;
		postcode = document.getElementById('postcode').value;
		phone = document.getElementById('phone').value;
		
		if((user_name == "")||(reg_name == "")||(reg_pwd == "")||(reg_pwd2 == "")||(address == "")||(postcode == "")||(phone == "")){
			alert('内容不能为空！');
			return;
		}

		if(reg_pwd != reg_pwd2) {
			alert('密码不一致！');
			return;
		}

		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null){
			alert ("Browser does not support HTTP Request");
			return;
		}

		var url="check.php?flag=reg&user_name=" + user_name + "&reg_name=" + reg_name + 
				"&reg_pwd=" + reg_pwd + "&address=" + address + "&postcode=" + postcode + "&phone=" + phone + "&sid="+Math.random();
		xmlHttp.onreadystatechange=saveStatus;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);

	}

	function saveStatus(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			x = xmlHttp.responseText;
			
			if(x == -1){
				alert('操作失败！请稍候重试！');
			}

			if(x == 1){
				alert('注册成功！');
				location.replace('http://121.42.211.188/badapple/login.php');
			}
			if(x == 00){
				alert('帐号名已注册！');
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