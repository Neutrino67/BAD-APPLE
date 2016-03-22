<?php

session_start();
error_reporting(0);

$timezone = "Asia/shanghai";
if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set($timezone);
}
header("Content-type:text/html;charset=UTF-8");
//BadApple(伊甸园)
class Show_index{

	function show_head($title){

		$login_name = $_SESSION['login_name'];
		$user_name = $_SESSION['user_name'];

		if($login_name == ""){
			$x = "<a href=\"http://121.42.211.188/badapple/login.php\">
					<div class=\"index_title_top\">
						<div class=\"index_title_text\">会员</div>
					</div>
				</a>";
		}else{
			$user_name = substr($user_name, 0, 18);
			$x = "<div class=\"index_title_top\">
					<div class=\"index_title_user\">$user_name...</div>
					<div class=\"index_logout\"><u><a href=\"javascript:logout()\">注销</a></u></div>
				</div>";
		}

		echo <<<HTML

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>$title</title>
			<link rel="stylesheet" href="http://121.42.211.188/badapple/css/style.css">
			<script src="http://121.42.211.188/badapple/css/jquery-1.10.1.js" type="text/javascript"></script>
		</head>
		<body>

			<div class="index">
				<div class="index_title">
					<div class="index_title_box">

						<div class="index_title_img">
							<a href="http://121.42.211.188/badapple/index.php"><img src="http://121.42.211.188/badapple/pic/badapple.png"></a>
						</div>

						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">数码</li>
								<a href="http://121.42.211.188/badapple/show/index.php?type=2"><li class="index_submeun_text">手机通讯</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=3"><li class="index_submeun_text">手机配件</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=4"><li class="index_submeun_text">摄影摄像</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=5"><li class="index_submeun_text">智能设备</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=6"><li class="index_submeun_text">电脑整机</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=7"><li class="index_submeun_text">电脑配件</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=8"><li class="index_submeun_text">游戏设备</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=9"><li class="index_submeun_text">网络产品</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">家居</li>
								<a href="http://121.42.211.188/badapple/show/index.php?type=11"><li class="index_submeun_text">厨具</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=12"><li class="index_submeun_text">家纺</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=13"><li class="index_submeun_text">家具</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=14"><li class="index_submeun_text">灯具</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=15"><li class="index_submeun_text">家装建材</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=16"><li class="index_submeun_text">生活用品</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=17"><li class="index_submeun_text">家装软饰</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=18"><li class="index_submeun_text">宠物生活</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">食品</li>
								<a href="http://121.42.211.188/badapple/show/index.php?type=20"><li class="index_submeun_text">中外名酒</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=21"><li class="index_submeun_text">进口食品</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=22"><li class="index_submeun_text">休闲食品</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=23"><li class="index_submeun_text">地方特产</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=24"><li class="index_submeun_text">饮料冲调</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=25"><li class="index_submeun_text">粮油调味</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=26"><li class="index_submeun_text">生鲜食品</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=27"><li class="index_submeun_text">食品礼卷</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">生活</li>
								<a href="http://121.42.211.188/badapple/show/index.php?type=29"><li class="index_submeun_text">男装</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=30"><li class="index_submeun_text">女装</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=31"><li class="index_submeun_text">箱包</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=32"><li class="index_submeun_text">首饰</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=33"><li class="index_submeun_text">护肤</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=34"><li class="index_submeun_text">洗发</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=35"><li class="index_submeun_text">护理</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=36"><li class="index_submeun_text">香水</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">图书</li>
								<a href="http://121.42.211.188/badapple/show/index.php?type=38"><li class="index_submeun_text">音像</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=39"><li class="index_submeun_text">少儿</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=40"><li class="index_submeun_text">教育</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=41"><li class="index_submeun_text">文艺</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=42"><li class="index_submeun_text">人文</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=43"><li class="index_submeun_text">生活</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=44"><li class="index_submeun_text">科技</li></a>
								<a href="http://121.42.211.188/badapple/show/index.php?type=45"><li class="index_submeun_text">刊物</li></a>
							</ul>
						</div>
						
						$x;
						
						<div id="search_img" class="index_title_img_right">
							<img class="search_img" src="http://121.42.211.188/badapple/pic/search_bar.png">
						</div>
						
						<a href="http://121.42.211.188/badapple/cart/shopcart.php">
							<div class="index_title_img_right" style="margin-left:50px;">
								<img src="http://121.42.211.188/badapple/pic/shopping_car.png">
							</div>
						</a>
					</div>
				</div>
			</div>
			<div style="padding-top:45px;"></div>

			<div class="show_search">
				<div>
					<div><input type="text" id="search_bar"></div>
					<div class="close">X</div>
				</div>
			</div>

HTML;
	}

	function show_foot(){
		echo <<<HTML

			<div class="copyright">
				<div class="copyright_text">Copyright @ 2015 BadApple. All rights reserved.</div>
			</div>
		</body>

		<script>
			$("#search_img").click(function(){
				$(".index_submeun_title").fadeOut();
				$(".index_title_text").fadeOut();
				$(".search_img").hide();
				$(".index_title_user").fadeOut();
				$(".index_logout").fadeOut();
				$(".show_search").fadeIn("slow");
				document.getElementById("search_bar").focus();
			})

			search_bar = document.getElementById("search_bar");
			search_bar.onkeyup = keyEvent;

			function keyEvent(){
				var key = event.keyCode;

				x = search_bar.value;
				
				if(key == 13){
					if(x == "") return;
					location.replace("http://121.42.211.188/badapple/search.php?key=" + x);
				}
			}

			$(".close").click(function(){
				$(".show_search").fadeOut();
				$(".index_submeun_title").fadeIn();
				$(".index_title_user").fadeIn();
				$(".index_logout").fadeIn();
				$(".index_title_text").fadeIn();
				$(".search_img").show();
			})

			$(".index_submeun").hover(function(){
				$(this).css("background", "white");
				$(this).find('.index_submeun_title').css("color", "#363636");
				$(this).find('.index_submeun_text').slideDown("fast");
			},function(){
				$(this).css("background", "none");
				$(this).find('.index_submeun_title').css("color", "white");
				$(this).find('.index_submeun_text').hide();
			});

			$(".index_submeun li").hover(function(){
				$(this).css("background", "white");
				$(this).css("color", "#363636");
			},function(){
				$(this).css("background", "#363636");
				$(this).css("color", "white");	
			});

			function logout(){
				if(!confirm("是否注销？")){
					return;
				}else{
					location.replace("http://121.42.211.188/badapple/check.php?flag=logout");
				}
			}
		</script>
		</html>

HTML;
	}
}
?>