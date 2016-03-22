<?php
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
?>

<html>
<head>
 <title>
	管理员登陆
 </title>
 <style>
 	.login{
	text-align: left;
	width: 100%;
}

.login_bg{
	width: 900px;
	height:450px;
	background:white;
	box-shadow:0 0 10px #B5B5B5;
	margin-top: 40px;
	margin-bottom: 40px;
}

.login_bg hr{
	width: 95%;
	margin-top: -10px;
	border: 1px solid #B5B5B5;
	opacity: 0.5;
}

.login_title{
	position: relative;
	width: 100%;
	height:90px;
	font-size: 22px;
	left:20px;
	top:27px;
}

.login_title2{
	margin-top: 60px;
	font-size: 20px;
	margin-left: 250px;
}

.login_input input{
	width:250px;
	height:25px;
	font-size: 16px;
	margin-left: 280px;
	margin-top: 8px;
}

.login_forget, .login_reg{
	font-size: 10px;
	margin-left: 280px;
	margin-top: 5px;
}

.login_forget a, .login_reg a{
	color:#00B2EE;
	text-decoration: underline;
}

.login_btn input{
	-webkit-appearance: none;
	width:80px;
	height:27px;
	font-size: 15px;
	background: #00B2EE;
	color:white;
	border: 1px solid #00B2EE;
	text-align: center;
	margin-top: 6px;
	position: relative;
	padding-bottom: 1px;
	left:455px;
	top:-20px;
	border-radius:8px;
	cursor: pointer;
}

.login_btn{
	margin-top: 20px;
	margin-right: 10px;
	display: block;
}

 </style>
</head>
<body>
	<form id="login_form" method = "post" action=<?php BATH_PATH.'/index.php' ?>>
		<div class="login">
			<div class="login_bg">
				<div class="login_title">请登入</div>
				<hr>
				<div class="login_title2">管理员登入</div>
				<div class="login_input" style="margin-top:20px;"><input type="text" name="user_name" id="user_name"></div>
				<div class="login_input"><input type="text" name="user_pwd" id="user_pwd"></div>
				<div class="login_btn"><input type="submit" value="登入"></div>
			</div>
		</div>
	</form>				
</body>
</html>