<?php

//BadApple(伊甸园)
class Show_index{

	function show_head($title){
		echo <<<HTML

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>$title</title>
			<link rel="stylesheet" href="css/style.css">
			<script src="css/jquery-1.10.1.js" type="text/javascript"></script>
		</head>
		<body>

			<div class="index">
				<div class="index_title">
					<div class="index_title_box">

						<div class="index_title_img">
							<a href="index.php"><img src="pic/badapple.png"></a>
						</div>

						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">数码</li>
								<a href="#"><li class="index_submeun_text">手机通讯</li></a>
								<a href="#"><li class="index_submeun_text">手机配件</li></a>
								<a href="#"><li class="index_submeun_text">摄影摄像</li></a>
								<a href="#"><li class="index_submeun_text">智能设备</li></a>
								<a href="#"><li class="index_submeun_text">电脑整机</li></a>
								<a href="#"><li class="index_submeun_text">电脑配件</li></a>
								<a href="#"><li class="index_submeun_text">游戏设备</li></a>
								<a href="#"><li class="index_submeun_text">网络产品</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">家居</li>
								<a href="#"><li class="index_submeun_text">厨具</li></a>
								<a href="#"><li class="index_submeun_text">家纺</li></a>
								<a href="#"><li class="index_submeun_text">家具</li></a>
								<a href="#"><li class="index_submeun_text">灯具</li></a>
								<a href="#"><li class="index_submeun_text">家装建材</li></a>
								<a href="#"><li class="index_submeun_text">生活用品</li></a>
								<a href="#"><li class="index_submeun_text">家装软饰</li></a>
								<a href="#"><li class="index_submeun_text">宠物生活</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">食品</li>
								<a href="#"><li class="index_submeun_text">中外名酒</li></a>
								<a href="#"><li class="index_submeun_text">进口食品</li></a>
								<a href="#"><li class="index_submeun_text">休闲食品</li></a>
								<a href="#"><li class="index_submeun_text">地方特产</li></a>
								<a href="#"><li class="index_submeun_text">饮料冲调</li></a>
								<a href="#"><li class="index_submeun_text">粮油调味</li></a>
								<a href="#"><li class="index_submeun_text">生鲜食品</li></a>
								<a href="#"><li class="index_submeun_text">食品礼卷</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">生活</li>
								<a href="#"><li class="index_submeun_text">男装</li></a>
								<a href="#"><li class="index_submeun_text">女装</li></a>
								<a href="#"><li class="index_submeun_text">箱包</li></a>
								<a href="#"><li class="index_submeun_text">首饰</li></a>
								<a href="#"><li class="index_submeun_text">护肤</li></a>
								<a href="#"><li class="index_submeun_text">洗发</li></a>
								<a href="#"><li class="index_submeun_text">护理</li></a>
								<a href="#"><li class="index_submeun_text">香水</li></a>
							</ul>
						</div>
						<div class="index_title_top">
							<ul class="index_submeun">
								<li class="index_submeun_title">图书</li>
								<a href="#"><li class="index_submeun_text">音像</li></a>
								<a href="#"><li class="index_submeun_text">少儿</li></a>
								<a href="#"><li class="index_submeun_text">教育</li></a>
								<a href="#"><li class="index_submeun_text">文艺</li></a>
								<a href="#"><li class="index_submeun_text">人文</li></a>
								<a href="#"><li class="index_submeun_text">生活</li></a>
								<a href="#"><li class="index_submeun_text">科技</li></a>
								<a href="#"><li class="index_submeun_text">刊物</li></a>
							</ul>
						</div>

						<div class="index_title_top">
							<a href="login.php"><div class="index_title_text">会员</div></a>
						</div>

						<div id="search_img" class="index_title_img_right">
							<img class="search_img" src="pic/search_bar.png">
						</div>

						<div class="index_title_img_right" style="margin-left:50px;">
							<img src="pic/shopping_car.png">
						</div>

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
				<div class="copyright_text">COPYRIGHT@2015</div>
			</div>
		</body>

		<script>
			$("#search_img").click(function(){
				$(".index_submeun_title").fadeOut();
				$(".index_title_text").fadeOut();
				$(".search_img").hide();
				$(".show_search").fadeIn("slow");
				document.getElementById("search_bar").focus();
			})

			$(".close").click(function(){
				$(".show_search").fadeOut();
				$(".index_submeun_title").fadeIn();
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
			})
		</script>
		</html>

HTML;
	}
}
?>